<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:TaxIdentifierTypeEnum
 */
enum TaxIdentifierType: string
{
    /**
     * This value indicates that the taxpayerId value is a Codice Fiscale ID, which is an identifier
     * used by the Italian government to identify taxpayers in Italy.
     */
    case CODICE_FISCALE = "CODICE_FISCALE";

    /**
     * This value indicates that the taxpayerId value is a CURP number, which is one identifier used
     * by the Mexican tax authorities (SAT) to identify taxpayers in Mexico. In Spanish, this ID is
     * known as the 'Clave Única de Registro de Población'.
     */
    case CURP = "CURP";

    /**
     * This value indicates that the taxpayerId value is a Spanish National Identity Number, which
     * is one identifier used by the Spanish government to identify taxpayers in Spain. In Spanish,
     * this ID is known as the 'Documento nacional de identidad'. The other tax identifier for
     * Spanish residents is the NIE number, or 'Numero de Identidad de Extranjero'.
     */
    case DNI = "DNI";

    /**
     * This value indicates that the taxpayerId value is a NIE Number, which is one identifier used
     * by the Spanish government to identify taxpayers in Spain. 'NIE' stands for 'Numero de
     * Identidad de Extranjero'. The other tax identifier for Spanish residents is the DNI number,
     * or 'Documento nacional de identidad'. Spanish residents can also be identified by their
     * Spanish VAT (Value-Added Tax) number, which is also called the 'Numero de Identificacion
     * Fiscal' or NIF.
     */
    case NIE = "NIE";

    /**
     * This value indicates that the taxpayerId value is an NIF Number, which is also known as their
     * Spanish VAT (Value-Added Tax) number. 'NIF' stands for 'Numero de Identificacion Fiscal'.
     * Spanish residents can also be identified by their DNI ('Documento nacional de identidad')
     * number or their NIE ('Numero de Identidad de Extranjero') number.
     */
    case NIF = "NIF";

    /**
     * This value indicates that the taxpayerId value is a NIT number, which is an identifier used
     * by the Guatemalan government to identify taxpayers in Guatemala. In Spanish, this ID is known
     * as the 'Numero de identificacion tributaria'.
     */
    case NIT = "NIT";

    /**
     * This value indicates taxpayerId value is a RFC number, which is one identifier used by the
     * Mexican tax authorities (SAT) to identify taxpayers in Mexico. In Spanish, this ID is known
     * as the 'Registro Federal de Contribuyentes'.
     */
    case RFC = "RFC";

    /**
     * This value indicates that the taxpayerId value is a Tax Registration Number, which is an
     * identifier used by the Chileans government to identify taxpayers in Chile. In Spanish, this
     * ID is known as the 'Rol Único Tributario'.
     */
    case RUT = "RUT";

    /**
     * This value indicates that the taxpayerId value is a VATIN number, which is the value-added
     * tax identification number for the buyer. This identifier is used for value added tax purposes
     * in many countries, including the countries of the European Union.
     */
    case VATIN = "VATIN";
}
