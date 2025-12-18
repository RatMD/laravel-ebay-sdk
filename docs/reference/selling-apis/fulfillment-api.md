---
outline: deep
---
# Fulfillment API <DocsBadge path="sell/fulfillment/static/overview.html" />

> [!CAUTION]
> This API has not yet been implemented yet.

The outcome of a buyer's eBay checkout process is an order. This API enables sellers to manage the 
completion of an order in accordance with the payment method and timing specified at checkout. The 
line items in the order are grouped into one or more packages. As the seller addresses, handles, and 
ships each package, the set of specifications for this process is known as a fulfillment. Use the 
Fulfillment API to facilitate and monitor these activities from the order to completion. Sellers' 
status on eBay depend partly on their record of timely fulfillment.

> [!NOTE]
> The Fulfillment API covers only the transactions that have completed the checkout process. 
> This API does not cover pending payment purchases that require upfront payment before shipment.

In addition to the 'get orders' and 'shipping fulfillment' methods, the Fulfillment API also has a 
seller-initiated issueRefund method and a full suite of payment dispute methods.

The issueRefund method allows a seller to issue a full or partial refund to a buyer for an order. 
Full or partial refunds can be issued at the order level or line item level.

The payment dispute methods allow the seller to retrieve and manage buyer-initiated payment 
disputes. These particular payment disputes are disputes that buyers open up with their payment 
provider, such as PayPal or Visa, and then the seller is alerted once the payment disputes come into 
eBay's system