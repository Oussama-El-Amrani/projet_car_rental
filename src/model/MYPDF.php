<?php

class MYPDF extends TCPDF
    {
        public function Header()
        {
            $this->Ln(5);
            // fint name size style
            $this->SetFont('helvetica', 'B', 12);
            $this->cell(189, 5, 'RenatalCarsFes', 0,1, 'C');
            $this->SetFont('helvetica', '', 8);
            $this->cell(189, 5, "Facture de l'occasion du voiture", 0,1, 'C');
            $this->cell(189, 5, "Phone 0695024167", 0,1, 'C');
            $this->cell(189, 5, "Email- elamranioussama01@gmail.com", 0,1, 'C');
            $this->SetFont('helvetica', 'B', 11);
            $this->Ln(2);
            $this->Cell(189, 3, "PAIEMENT & L'occasion", 0, 1, 'C');
        }

        public function Footer()
        {
            $this->SetY(-148); 
            $this->Ln(5);
            $this->SetFont('times', 'B', 10);  
            $this->MultiCell(189, 15, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro consequatur quis omnis eum corporis eveniet sed nihil libero, ut ullam officia ad at dolor excepturi magni necessitatibus vero aspernatur! Quia.', 0, 'L', 0, 1, '', '', true);
            $this->Cell(20,1,'_____________________________', 0,0);
            $this->Cell(118, 1,'', 0, 0);
            $this->Cell(51,1,'_____________________________', 0,1);
        }
    }