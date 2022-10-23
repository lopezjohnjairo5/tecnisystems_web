<?php
function template_pdf_air($array_info=0){
    $pdf = new FPDF('P','mm','Legal');

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);
    $pdf->Image(".".IMGS.'logo64x64.png',19,10,-90);

    $pdf->SetY(28);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',9);
    $txt = utf8_decode('Tecnisystems S.A.S.');
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY(12);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40);
    $txt = utf8_decode('            Calle 14 N°.54-39 Piso 2
    Cels: 310 628 1704 / 316 466 9197
                     Tel: 702 5798');

    $pdf->MultiCell(0,5,$txt);
    $pdf->Ln();

    $pdf->SetTextColor(220,50,50);
    $txt = utf8_decode('INFORME DE MANTENIMIENTO
        DE AIRE ACONDICIONADO');

    $pdf->SetY(10);
    $pdf->SetX(-80);
    $pdf->MultiCell(0,5,$txt);
    $pdf->Ln();
    $pdf->Ln();

    $col_posx = -90;
    $col_posy = 25;

    $pdf->SetFont('Arial','',9);
    $pdf->SetTextColor(220,50,50);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(230,230,0);
    $array_parts_date = explode("-",$array_info[0]["date_general"]);
    $pdf->Cell(10,10,utf8_decode($array_parts_date[0]),1,1,'C',true);

    $col_posx = -79;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(10,10,utf8_decode($array_parts_date[1]),1,1,'C',true);

    $col_posx = -68;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(10,10,utf8_decode($array_parts_date[2]),1,1,'C',true);

    $pdf->SetY(25);
    $pdf->SetX(-55);
    $pdf->Cell(40,10,utf8_decode($array_info[0]["serialNumberReport"]),1,1,'C',true);

    $pdf->SetY(40);
    $pdf->SetFont('Arial','',11);

    $pdf->SetTextColor(0,0,0);
    $txt = utf8_decode("    Cliente: ________________________ Tel:__________________ Responsable:______________________
    Dirección: __________________ C/D:_____________________ Sucursal:_____________ Area:_________
    Marca equipo: ___________________ Modelo:___________ Tipo:______________ Capacidad:_________
        ");
    $pdf->MultiCell(0,5,$txt);


    $pdf->SetY(57);

    $txt = utf8_decode("    Mant.Preventivo                        Mant.Correctivo                        Inspección                        Emergencia  ");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY(57);
    $pdf->SetX(45);
    $pdf->Cell(5,5," ",1,1);

    $pdf->SetY(57);
    $pdf->SetX(100);
    $pdf->Cell(5,5," ",1,1);

    $pdf->SetY(57);
    $pdf->SetX(145);
    $pdf->Cell(5,5," ",1,1);

    $pdf->SetY(57);
    $pdf->SetX(-25);
    $pdf->Cell(5,5," ",1,1);

    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(5,5,"PERSONAL",0,1);

    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Técnico:_____________________ Técnico:_____________________ Técnico:_____________________ ");
    $pdf->MultiCell(0,5,$txt);

    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell(55,5,utf8_decode("Datos Técnicos y mediciones"),1,1,'C',true);

    $pdf->SetX(15);
    $pdf->SetFillColor(230,230,0);
    $pdf->Cell(55,5,utf8_decode("Unidad Manejadora"),1,1,'C',true);
    $pdf->SetX(15);
    $pdf->SetFillColor(255,255,255);

    $pdf->Cell(55,20," ",1,1);
    $pdf->SetX(15);
    $pdf->Cell(55,20," ",1,1);
    $pdf->SetX(15);
    $pdf->Cell(55,15," ",1,1);

    $pdf->SetY(97);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(102);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(107);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(112);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);

    $pdf->SetY(100);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Motor \ndatos de\nplaca");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY(97);
    $pdf->SetX(35);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("HP\nVOL\nAMP\nRPM");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY(117);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(122);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(127);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(132);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);

    $pdf->SetY(120);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Medición \n(voltaje)");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY(117);
    $pdf->SetX(33);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("V11-12\nV12-13\nV13-14");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY(137);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(142);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY(147);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);

    $pdf->SetY(140);
    $pdf->SetX(15);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Amperaje");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY(137);
    $pdf->SetX(40);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("I1\nI2\nI3");
    $pdf->MultiCell(0,5,$txt);

    $col_posx = 75;
    $col_posy = 87;
    $col_width = 125;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $pdf->SetFillColor(255,255,255);
    $pdf->Cell($col_width,5,utf8_decode("Labores y revisiones realizadas"),1,1,'C',true);

    $pdf->SetX($col_posx);

    $pdf->SetFillColor(230,230,0);
    $pdf->Cell($col_width,5,utf8_decode("Unidad Manejadora"),1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(255,255,255);

    $col_posx = 75;
    $col_posy = 97;
    $col_width = 42;

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Limpieza interior - exterior "),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Lavado de serpientes "),1,1);
    $pdf->SetX($col_posx);
    $pdf->MultiCell($col_width,5,utf8_decode("Ajuste de prisioneros (rot)\ny chumaceras"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Lavado filtros aire "),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Tensión de correas/cambio"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. rodamientos Mot/Chum"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Limpieza Desagues"),1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. aislamiento interior"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Limpieza Cuarto máquinas"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"NF",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,10," ",1,1);


    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,10," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C/R",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,10," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 41;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Ajuste general de tornillos"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. valvulas de explansión"),1,1);
    $pdf->SetX($col_posx);
    $pdf->MultiCell($col_width,5,utf8_decode("Revisión/ajuste, accesorios y tornilleria de tab. control"),1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Lamparas de oper. y alarma"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. consumo eléctrico"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. control remoto"),1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. bomba condensado"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. termostato"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Inspección motor"),1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"NF",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,10," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,10," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C/R",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,10," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx = 15;
    $col_posy = 152;
    $col_width = 55;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $pdf->SetFillColor(230,230,0);
    $pdf->Cell($col_width,5,utf8_decode("Unidad condensadora"),1,1,'C',true);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $pdf->SetFillColor(255,255,255);
    $pdf->Cell($col_width,5,utf8_decode("Compresor"),1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(255,255,255);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $pdf->Cell($col_width,15," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,20," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,15," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,10," ",1,1);

    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posx = 15;
    $col_posy = 165;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Datos de\nplaca");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY($col_posy-3);
    $pdf->SetX($col_posx+20);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("HP\nVOL\nAMP");
    $pdf->MultiCell(0,5,$txt);

    $col_posy +=15;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Medición \n(voltaje)");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY($col_posy-3);
    $pdf->SetX($col_posx+18);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("V11-12\nV12-13\nV13-14");
    $pdf->MultiCell(0,5,$txt);


    $col_posy +=20;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Amperaje");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY($col_posy-3);
    $pdf->SetX($col_posx+25);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("I1\nI2\nI3");
    $pdf->MultiCell(0,5,$txt);

    $col_posy +=12;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Presión\n(estado)");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY($col_posy-1);
    $pdf->SetX($col_posx+22);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("Alta\nBaja");
    $pdf->MultiCell(0,5,$txt);

    $col_posy = 152;
    $col_posx = 75;
    $col_width = 125;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $pdf->SetFillColor(230,230,0);
    $pdf->Cell($col_width,5,utf8_decode("Unidad condensadora y Compresor"),1,1,'C',true);

    $col_posx = 75;
    $col_posy += 5;
    $col_width = 42;
    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Funcionamiento General "),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Limpieza interior y exterior"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Lavado serpientes"),1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Ajustes rotores ventiladores"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Temperatura Vent. Forzada"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Ajuste general tornillos"),1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"NF",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C/R",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 41;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Rev. accesorios elect."),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Ajuste Tornilleria Tab. Ctrl"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Ruidos"),1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Estado soportes"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Escapes"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"NF",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C/R",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);


    $col_posy +=35;
    $col_posx = 75;
    $col_width = 125;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(230,230,0);
    $pdf->Cell($col_width,5,utf8_decode("Interconección sistema de refrigeración"),1,1,'C',true);

    $col_posx = 75;
    $col_posy += 5;
    $col_width = 42;
    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Aislamiento chaq. aluminio "),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Filtro secador"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Válvulas de corte"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Escape tub. y accesorios"),1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"NF",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);


    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C/R",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);


    $col_posx += $col_width;
    $col_width = 41;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Soporteria"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Mirilla"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Val. Selonoide"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,utf8_decode("Temp. linea succión y liqu."),1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"NF",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx += $col_width;
    $col_width = 7;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5,"C/R",1,1,'C',true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posx = 15;
    $col_posy += 25;
    $col_width = 55;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(230,230,0);
    $pdf->Cell($col_width,5,utf8_decode("  Motor ventilador"),1,1,'L',true);

    $pdf->SetX($col_posx);
    $pdf->SetFillColor(255,255,255);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $pdf->Cell($col_width,20," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,15," ",1,1);

    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posy += 5;
    $pdf->SetY($col_posy);
    $pdf->SetX(45);
    $pdf->Cell(25,5," ",1,1);
    $pdf->SetY($col_posy);
    $pdf->SetX(58);

    $col_posx = 15;
    $col_posy -= 26;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Datos de\nplaca");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY($col_posy-3);
    $pdf->SetX($col_posx+20);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("RPM\nVOL\nAMP\nHP");
    $pdf->MultiCell(0,5,$txt);

    $col_posy +=20;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Amperaje");
    $pdf->MultiCell(0,5,$txt);

    $pdf->SetY($col_posy-3);
    $pdf->SetX($col_posx+25);
    $pdf->SetFont('Arial','',9);
    $txt = utf8_decode("I1\nI2\nI3");
    $pdf->MultiCell(0,5,$txt);

    $col_posy -=29;
    $col_posx = 75;
    $col_width = 125;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(230,230,0);
    $pdf->Cell($col_width,5,utf8_decode("Observaciones"),1,1,'C',true);

    $col_posx = 75;
    $col_posy += 5;
    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,5," ",1,1);

    $col_posy = 330;
    $col_posx = 15;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(30,5,utf8_decode("H. DE ENTRADA: ______________ H. DE SALIDA: ______________"),0,1,'L');

    $pdf->SetY($col_posy-45);
    $pdf->SetX($col_posx+145);
    $pdf->Cell(30,5,utf8_decode("Recibí a conformidad"),0,1,'C');

    $pdf->SetY($col_posy-40);
    $pdf->SetX($col_posx+140);
    $pdf->Cell(40,40,utf8_decode(""),1,1,'L');

    $pdf->SetX($col_posx+145);
    $pdf->Cell(30,5,utf8_decode("Firma y sello cliente"),0,1,'C');

    $col_posy = 38;
  	$col_posx = 30;
  	$pdf->SetTextColor(100,50,50);

  	$pdf->SetFont('Arial','',10);
  	$pdf->SetY($col_posy);
  	$pdf->SetX($col_posx);
    $name = limit_size_words($array_info[1]["nameClient"],0,25);
    $pdf->Cell(35,10,utf8_decode($name),0,1,'L');

    $col_posx = 90;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $phone = limit_size_words($array_info[1]["phoneClient"],0,18);
    $pdf->Cell(35,10,utf8_decode($phone),0,1,'L');

    $col_posx = 154;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $personInCharge = limit_size_words($array_info[1]["personInCharge"],0,20);
    $pdf->Cell(35,10,utf8_decode($personInCharge),0,1,'L');

    $col_posy = 43;
    $col_posx = 35;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $address = limit_size_words($array_info[0]["address"],0,18);
    $pdf->Cell(35,10,utf8_decode($address),0,1,'L');

    $col_posx = 83;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $cityDep = limit_size_words($array_info[2]["city"]." | ".$array_info[2]["department"],0,23);
    $pdf->Cell(35,10, utf8_decode($cityDep),0,1,'L');

    $col_posx = 144;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $branchOffice = limit_size_words($array_info[0]["branchOffice"],0,14);
    $pdf->Cell(35,10,utf8_decode($branchOffice),0,1,'L');

    $col_posx = 183;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $area = limit_size_words($array_info[0]["area"],0,8);
    $pdf->Cell(35,10,utf8_decode($area),0,1,'L');

    $col_posy = 48;
    $col_posx = 42;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $brand = limit_size_words($array_info[5]["Brand"],0,19);
    $pdf->Cell(35,10,utf8_decode($brand),0,1,'L');

    $col_posx = 97;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $product = limit_size_words($array_info[5]["Product"],0,10);
    $pdf->Cell(35,10,utf8_decode($product),0,1,'L');

    $col_posx = 132;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $typeP = limit_size_words($array_info[5]["AirConditioningTypes"],0,12);
    $pdf->Cell(35,10,utf8_decode($typeP),0,1,'L');

    $col_posx = 183;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $capacity = limit_size_words($array_info[5]["capacity"],0,8);
    $pdf->Cell(35,10,utf8_decode($capacity),0,1,'L');

    $col_posy = 55;
    if ($array_info[0]["idTypeMaintenance"] == 1) {
      $col_posx = 45;
    }else if($array_info[0]["idTypeMaintenance"] == 2){
      $col_posx = 100;
    }else if ($array_info[0]["idTypeMaintenance"] == 3) {
      $col_posx = 145;
    }else {
      $col_posx = 191;
    }
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 75;
    $col_posx = 31;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $tech1 = limit_size_words($array_info[6]["TechnicalUser"],0,20);
    $pdf->Cell(35,10,utf8_decode($tech1),0,1,'L');

    $col_posx = 92;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $tech2 = limit_size_words($array_info[7]["TechnicalUser"],0,20);
    $pdf->Cell(35,10,utf8_decode($tech2),0,1,'L');

    $col_posx = 154;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $tech3 = limit_size_words($array_info[8]["TechnicalUser"],0,20);
    $pdf->Cell(35,10,utf8_decode($tech3),0,1,'L');

    $col_posy = 95;
    $col_posx = 47;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitMotorHp"]),0,1,'L');

    $col_posy = 100;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitMotorVolt"]),0,1,'L');

    $col_posy = 105;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitMotorAmp"]),0,1,'L');

    $col_posy = 110;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitMotorRPM"]),0,1,'L');

    $col_posy = 115;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitMeasurementsV11_12"]),0,1,'L');

    $col_posy = 120;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitMeasurementsV12_13"]),0,1,'L');

    $col_posy = 125;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitMeasurementsV13_14"]),0,1,'L');

    $col_posy = 135;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitAmpI1"]),0,1,'L');

    $col_posy = 140;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitAmpI2"]),0,1,'L');

    $col_posy = 145;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airDriveUnitAmpI3"]),0,1,'L');

    $col_posy = 160;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingPlateDataHp"]),0,1,'L');

    $col_posy = 165;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingPlateDataVol"]),0,1,'L');

    $col_posy = 170;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingPlateDataAmp"]),0,1,'L');

    $col_posy = 175;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingMeasurementsV11_12"]),0,1,'L');

    $col_posy = 180;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingMeasurementsV12_13"]),0,1,'L');

    $col_posy = 185;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingMeasurementsV13_14"]),0,1,'L');

    $col_posy = 195;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingAmpI1"]),0,1,'L');

    $col_posy = 200;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingAmpI2"]),0,1,'L');

    $col_posy = 205;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingAmpI3"]),0,1,'L');

    $col_posy = 210;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingPressuresHigh"]),0,1,'L');

    $col_posy = 215;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["airCondensingPressuresLow"]),0,1,'L');

    $col_posy = 225;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["AirFanMotorRPM"]),0,1,'L');

    $col_posy = 230;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["AirFanMotorVol"]),0,1,'L');

    $col_posy = 235;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["AirFanMotorAmp"]),0,1,'L');

    $col_posy = 240;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["AirFanMotorHp"]),0,1,'L');

    $col_posy = 245;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["AirFanMotorAmpI1"]),0,1,'L');

    $col_posy = 250;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["AirFanMotorAmpI2"]),0,1,'L');

    $col_posy = 255;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode($array_info[3]["AirFanMotorAmpI3"]),0,1,'L');

    $col_posy = 100;
    $col_posx = define_position_x_tabs($array_info[4]["WRInternalExternalCleaning"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRSnakeWashing"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 7;
    $col_posx = define_position_x_tabs($array_info[4]["WRAdjustmentOfStudBoltsOfRotorsBearings"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 7;
    $col_posx = define_position_x_tabs($array_info[4]["WRAirFilterWashing"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRBeltTensionAndChange"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRInspectionOfBearingsAndBearings"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRDrainCleaning"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRInternalInsulationCheck"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRMachineRoomCleaning"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 100;
    $col_posx = define_position_x_tabs($array_info[4]["WRGeneralScrewAdjustment"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRExpansionValveCheck"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 7;
    $col_posx = define_position_x_tabs($array_info[4]["WRInspectionElectricalAccessoriesAndScrews"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 7;
    $col_posx = define_position_x_tabs($array_info[4]["WROperationAndAlarmLamps"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRElectricalConsumptionReview"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRRemoteControlReview"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRCondensatePumpCheck"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WRThermostatRevision"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy += 5;
    $col_posx = define_position_x_tabs($array_info[4]["WREngineInspection"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 160;
    $col_posx = define_position_x_tabs($array_info[4]["generalCompressorUnitOperation"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 165;
    $col_posx = define_position_x_tabs($array_info[4]["internalAndExternalCleaningCompressorUnit"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 170;
    $col_posx = define_position_x_tabs($array_info[4]["snakeWashingCompressorUnit"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 175;
    $col_posx = define_position_x_tabs($array_info[4]["compressorUnitRotorOrFanSettings"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 180;
    $col_posx = define_position_x_tabs($array_info[4]["compressorUnitForcedVentilationTemperature"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 185;
    $col_posx = define_position_x_tabs($array_info[4]["generalAdjustmentOfCompressorUnitScrews"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 160;
    $col_posx = define_position_x_tabs($array_info[4]["reviewOfAccessoriesAndScrewsCompressorUnit"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 165;
    $col_posx = define_position_x_tabs($array_info[4]["controlBoardBoltAdjustment"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 170;
    $col_posx = define_position_x_tabs($array_info[4]["compressorUnitNoise"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 175;
    $col_posx = define_position_x_tabs($array_info[4]["statusOfCompressorUnitSupports"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 180;
    $col_posx = define_position_x_tabs($array_info[4]["compressorUnitExhaust"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 200;
    $col_posx = define_position_x_tabs($array_info[4]["insulationJacketAluminumCoolingSystem"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 205;
    $col_posx = define_position_x_tabs($array_info[4]["filterDrierCoolingSystem"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 210;
    $col_posx = define_position_x_tabs($array_info[4]["shearValvesCoolingSystem"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 215;
    $col_posx = define_position_x_tabs($array_info[4]["exhaustPipeAndAccessoriesCoolingSystem"]);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 200;
    $col_posx = define_position_x_tabs($array_info[4]["coolingSystemSupport"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 205;
    $col_posx = define_position_x_tabs($array_info[4]["coolingSystemSightGlass"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 210;
    $col_posx = define_position_x_tabs($array_info[4]["solenoidValveCoolingSystem"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 215;
    $col_posx = define_position_x_tabs($array_info[4]["suctionLineTempAndLiquidRefrigerationSystem"],180);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(35,10,utf8_decode("X"),0,1,'L');

    $col_posy = 227;
    $col_posx = 78;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $obs = limit_size_words($array_info[0]["observations"],0,420);
    $text = utf8_decode($obs);
    $pdf->MultiCell(120,5,$text);

    $col_posy = 330;
    $col_posx = 42;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(10,5,utf8_decode($array_info[0]["startTime"]),0,1,'L');

    $col_posx = 92;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(10,5,utf8_decode($array_info[0]["endTime"]),0,1,'L');

    $col_posy = 270;
    $col_posx = 180;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $name_element = explode("/",$array_info[1]["clientFirmPath"]);
    $name_element = $name_element[count($name_element)-1];
    $user_firm = URL_BASE."tecnisystems_reports/documents/firms/".$name_element;
    $pdf->Image($user_firm,152,292,35,35);

    $pdf->Output();
}

function define_position_x_tabs($num,$base=118){
  $col_posx = $base;
  if ($num == 1) {
    $col_posx = $base;
  }else if ($num == 2) {
    $col_posx += 8;
  }else if($num == 3){
    $col_posx += 14;
  }
  return $col_posx;
}

?>
