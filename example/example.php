<?php
// set User vars
$password = 'a0123456789';
$cer_path = 'aaa010101aaa_CSD_10.cer';
$key_path = 'aaa010101aaa_CSD_10.key';
//$noAprobacion = '';
//$anoAprobacion = '';

// set CDF array
$array['serie'] = 'A';
//$array['noAprobacion'] = $noAprobacion;
//$array['anoAprobacion'] = $anoAprobacion;
$array['folio'] = '1'; // Long: 1 - 20
$array['fecha'] = '2010-11-25T16:30:00'; // ISO 8601 aaaa-mm-ddThh:mm:ss
$array['formaDePago'] = 'Pago en una sola exhibición'; // Pago en una sola exibición | Parcialidad 1 de X.
$array['tipoDeComprobante'] = 'ingreso'; // ingreso | egreso | traslado

$array['Emisor']['rfc'] = 'FDTL000000XXX';
$array['Emisor']['nombre'] = 'Nombre del Proveedor';
$array['DomicilioFiscal']['calle'] = 'Calle del Proveedor';
$array['DomicilioFiscal']['noExterior'] = 100;
$array['DomicilioFiscal']['noInterior'] = 'A';
$array['DomicilioFiscal']['colonia'] = 'De los proveedores';
$array['DomicilioFiscal']['municipio'] = 'Monterrey';
$array['DomicilioFiscal']['estado'] = 'Nuevo León';
$array['DomicilioFiscal']['pais'] = 'México';
$array['DomicilioFiscal']['codigoPostal'] = 64000;

//$array['ExpedidoEn'] = $array['DomicilioFiscal'];

$array['Receptor']['rfc'] = 'AAAA000000XXX';
$array['Receptor']['nombre'] = 'Nombre del Cliente';
$array['Domicilio']['calle'] = 'Esperanza';
$array['Domicilio']['noExterior'] = 100;
$array['Domicilio']['noInterior'] = 'A';
$array['Domicilio']['colonia'] = 'Del Pueblo';
$array['Domicilio']['municipio'] = 'Tampico';
$array['Domicilio']['estado'] = 'Tamaulipas';
$array['Domicilio']['pais'] = 'México';
$array['Domicilio']['codigoPostal'] = 89000;

$array['Concepto'][0]['cantidad'] = 1;
$array['Concepto'][0]['unidad'] = 'Torre de discos';
$array['Concepto'][0]['descripcion'] = 'CD-RW de 720Mb';
$array['Concepto'][0]['valorUnitario'] = 300;
$array['Concepto'][0]['importe'] = 300;

$array['Concepto'][1]['cantidad'] = 1;
$array['Concepto'][1]['unidad'] = 'Torre de discos';
$array['Concepto'][1]['descripcion'] = 'DVD-RW';
$array['Concepto'][1]['valorUnitario'] = 400;
$array['Concepto'][1]['importe'] = 400;

$array['subTotal'] = 700;
$array['Retencion'][0]['impuesto'] = 'IVA';
$array['Retencion'][0]['importe'] = 112;
//$array['descuento'] = '';
$array['total'] = 812;


// calls SimpleCDF methods
require_once '../SimpleCFD.php';

$array['sello'] = SimpleCFD::signData( SimpleCFD::getPrivateKey( $key_path, $password ),
                                       SimpleCFD::getOriginalString( $array ) );
$array['noCertificado'] = SimpleCFD::getSerialFromCertificate( $cer_path );
$array['certificado'] = SimpleCFD::getCertificate( $cer_path, false );

// prints the XML result
echo SimpleCFD::getXML( $array );
//echo SimpleCFD::getPDF( $array );
?>
