---
outline: deep
---
# Media API <DocsBadge path="commerce/media/overview.html" />

The Media API allows users to create, upload, and fetch videos. Users can also create, upload, and 
fetch documents to attach to their listings. See Business use cases for specifics.

## Document

### CreateDocument <DocsBadge path="commerce/media/resources/document/methods/createDocument" />

<ResourcePath method="POST">/document</ResourcePath>
This method stages a document to be uploaded, and requires the type of document to be uploaded, and 
the language(s) that the document contains. A successful call returns a documentId value that is 
then used as a path parameter in an uploadDocument call.

When a document is successfully created, the method returns the HTTP Status Code 201 Created. The 
method returns documentId in the response payload, which you can use to retrieve the document 
resource. This ID is also returned in the location header, for convenience.

> [!CAUTION]
> Make sure to capture the document ID value returned in the response payload. This value is 
> required to use the other methods in the document resource, and also needed to associate a 
> document to a listing using the Trading and Inventory APIs.

To upload a created document, use the document ID returned from this method's response with the 
uploadDocument method. See Managing documents for information on creating, uploading, and adding 
documents to listings.

> [!CAUTION]
> All POST methods in the Media API, including this method, are subject to short-duration rate 
> limits at the user level: 50 requests per 5 seconds.

```php
use Rat\eBaySDK\API\MediaAPI\Document\CreateDocument;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateDocument(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateDocumentFromUrl <DocsBadge path="commerce/media/resources/document/methods/createDocumentFromUrl" />

<ResourcePath method="POST">/document/create_document_from_url</ResourcePath>

This method downloads a document from the provided URL and adds that document to the user's account. 
This method requires the URL of the document, the type of document to be uploaded, and the 
language(s) that the document contains.

When a document is successfully created, the method returns the HTTP Status Code 201 Created. The 
method returns documentId in the response payload, which you can use to retrieve the document 
resource. This ID is also returned in the location header, for convenience.

After creating a document using this method, a getDocument call should be made to check for a 
documentStatus of ACCEPTED. Only documents with this status can be added to a listing. See Managing 
documents for more information on creating, uploading, and adding documents to listings.

```php
use Rat\eBaySDK\API\MediaAPI\Document\CreateDocumentFromUrl;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateDocumentFromUrl(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetDocument <DocsBadge path="commerce/media/resources/document/methods/getDocument" />

<ResourcePath method="GET">/document/{documentId}</ResourcePath>

This method retrieves the current status and metadata of the specified document.

```php
use Rat\eBaySDK\API\MediaAPI\Document\GetDocument;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetDocument(
    documentId: (string) $documentId
);
$response = $client->execute($request);
```

### UploadDocument <DocsBadge path="commerce/media/resources/document/methods/uploadDocument" />

<ResourcePath method="POST">/document/{documentId}/upload</ResourcePath>

This method associates the specified file with the specified document ID and uploads the input file. 
After the file has been uploaded, the processing of the file begins. Supported file types include 
.PDF, .JPEG/.JPG, and .PNG, with a maximum file size of 10 MB (10485760 bytes).

> [!NOTE]
> Animated and multi-page PNG files are not currently supported.

> [!NOTE]
> The document ID value returned in the response of the createDocument method is a required input 
> path parameter for this method. This value is also returned in the location header of the 
> createDocument response payload.

```php
use Rat\eBaySDK\API\MediaAPI\Document\UploadDocument;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UploadDocument(
    documentId: (string) $documentId,
    documentPath: (string) $documentPath,
    fileName: (string) $fileName = null,
);
$response = $client->execute($request);
```

## Image

### CreateImageFromFile <DocsBadge path="commerce/media/resources/image/methods/createImageFromFile" />

<ResourcePath method="POST">/image/create_image_from_file</ResourcePath>

This method uploads a picture file to eBay Picture Services (EPS) using multipart/form-data.

All images must comply with eBay's picture requirements, such as dimension and file size 
restrictions. For more information, see Picture policy. The image formats supported are JPG, GIF, 
PNG, BMP, TIFF, AVIF, HEIC, and WEBP. For more information, see Image requirements.

> [!NOTE]
> Animated GIF, and multi-page PNG/TIFF files, are not supported. Any animation effect of supported 
formats will be lost upon upload.

```php
use Rat\eBaySDK\API\MediaAPI\Image\CreateImageFromFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateImageFromFile(
    imagePath: (string) $imagePath,
    fileName: (string) $fileName = null
);
$response = $client->execute($request);
```

### CreateImageFromUrl <DocsBadge path="commerce/media/resources/image/methods/createImageFromUrl" />

<ResourcePath method="POST">/image/create_image_from_url</ResourcePath>

This method uploads a picture to eBay Picture Services (EPS) from the specified URL. Specify the 
location of the picture on an external web server through the imageUrl field.

All images must comply with eBay’s picture requirements, such as dimension and file size 
restrictions. For more information, see Picture policy. The image formats supported are JPG, GIF, 
PNG, BMP, TIFF, AVIF, HEIC, and WEBP. In addition, the provided URL must be secured using HTTPS 
(HTTP is not permitted). For more information, see Image requirements.

> [!NOTE]
> Animated GIF, and multi-page PNG/TIFF files, are not supported. Any animation effect of supported 
formats will be lost upon upload.

```php
use Rat\eBaySDK\API\MediaAPI\Image\CreateImageFromUrl;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateImageFromUrl(
    imageUrl: (string) $imageUrl
);
$response = $client->execute($request);
```

### GetImage <DocsBadge path="commerce/media/resources/image/methods/getImage" />

<ResourcePath method="GET">/image/{imageId}</ResourcePath>

This method retrieves an EPS image URL and its expiration details for the unique identifier 
specified in the path parameter image_id. Use the retrieved EPS image URL to add the image to a 
listing through the Inventory API or the Trading API. See Managing images for additional details.

> [!NOTE]
> If a user inputs a valid image_id as a path parameter but the EPS image associated with that ID 
> has expired, the call will fail and a 404 Not Found status code will be returned.

```php
use Rat\eBaySDK\API\MediaAPI\Image\GetImage;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetImage(
    imageId: (string) $imageId
);
$response = $client->execute($request);
```

## Video

### CreateVideo <DocsBadge path="commerce/media/resources/video/methods/createVideo" />

<ResourcePath method="POST">/video</ResourcePath>

This method creates a video resource. When using this method, specify the title, size, and 
classification of the video resource to be created. Description is an optional field for this method.

When a video resource is successfully created, the method returns the HTTP Status Code 201 Created.
The method also returns the location response header containing the video ID, which you can use to 
retrieve the video.

> [!NOTE]
> There is no ability to edit metadata on videos at this time. There is also no method to delete 
> videos.

```php
use Rat\eBaySDK\API\MediaAPI\Video\CreateVideo;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateVideo(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetVideo <DocsBadge path="commerce/media/resources/video/methods/getVideo" />

<ResourcePath method="GET">/video/{videoId}</ResourcePath>

This method retrieves a video's metadata and content given a specified video ID. The method returns 
the title, size, classification, description, video ID, playList, status, status message (if any), 
expiration date, and thumbnail image of the retrieved video.

The video's title, size, classification, and description are set using the createVideo method.

The video's playList contains two URLs that link to instances of the streaming video based on the 
supported protocol.

The status field contains the current status of the video. After a video upload is successfully 
completed, the video's status will show as PROCESSING until the video reaches one of the terminal 
states of LIVE, BLOCKED or PROCESSING_FAILED.

If a video's processing fails, it could be because the file is corrupted, is too large, or its size 
doesn't match what was provided in the metadata. Refer to the error messages to determine the cause 
of the video's failure to upload.

The status message will indicate why a video was blocked from uploading.

If a video is not being used on an active listing, its expiration date is automatically set to 30 
days after the video's initial upload.

The video's thumbnail image is automatically generated when the video is created.

```php
use Rat\eBaySDK\API\MediaAPI\Video\CreateVideo;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateVideo(
    videoId: (string) $videoId
);
$response = $client->execute($request);
```

### UploadVideo <DocsBadge path="commerce/media/resources/video/methods/uploadVideo" />

<ResourcePath method="POST">/video/{videoId}/upload</ResourcePath>

This method associates the specified file with the specified video ID and uploads the input file. 
After the file has been uploaded the processing of the file begins.

> [!NOTE]
> The size of the video to be uploaded must exactly match the size of the video's input stream that 
> was set in the createVideo method. If the sizes do not match, the video will not upload 
> successfully.

When a video is successfully uploaded, it returns the HTTP Status Code 200 OK.

```php
use Rat\eBaySDK\API\MediaAPI\Video\UploadVideo;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UploadVideo(
    videoId: (string) $videoId,
    videoPath: (string) $videoPath,
    fileName: (string) $fileName = null,
);
$response = $client->execute($request);
```