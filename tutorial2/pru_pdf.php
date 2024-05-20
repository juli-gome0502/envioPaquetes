<?php
require_once('/fpdf186/fpdf.php');

class PDF extends FPDF /* heredamos la clase FPDF */
{
    function Header() /* CABEZA DE LA PAGINA  */
    {
        $this->AddLink(); /* this accesder al ling del logo */
        $this->Image('../img/safe-delivery.png',10,10,55,0,'','www.jairogaleas.com'); /* llama la imagen del logo */
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(80); /* movemos a la posicion deseada */
        $this->Cell(30,10, 'SAFE-DELIVERY',0,1, 'C');
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(80); /* movemos a la posicion deseada */
        $this->Cell(30,10, 'Envio Paquetes',0,1, 'C');
        $this->Ln(10); /* Salto de linea */


    }

    function Footer()
    {
        $this->SetY(-18);
        $this->SetFont('Arial', 'I', 12);
        $this->AddLink();
        $this->Cell(5,10, 'www.jairogaleas.com',0,0,'L');
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo(). ' de {nb}',0,0, 'C');



    }
}
?>
