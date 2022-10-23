<?php

function template_pdf_pump($array_info=0){
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
    $txt = utf8_decode('CONTROL DE SERVICIO Y MANTENIMIENTO DE MOTOBOMBAS');

    $pdf->SetY(10);
    $pdf->SetX(-80);
    $pdf->MultiCell(0,5,$txt);
    $pdf->Ln();
    $pdf->Ln();

    $col_posx = -90;
    $col_posy = 27;

    $pdf->SetFont('Arial','',9);
    $pdf->SetTextColor(220,50,50);
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(230,230,0);
    $report_date = explode("-",$array_info[0]["date_general"]);
    $pdf->Cell(10,10,utf8_decode($report_date[0]),1,1,'C',true);

    $col_posx = -79;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(10,10,utf8_decode($report_date[1]),1,1,'C',true);

    $col_posx = -68;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(10,10,utf8_decode($report_date[2]),1,1,'C',true);

    $col_posx = -55;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,10,utf8_decode($array_info[0]["serialNumberReportPR"]),1,1,'C',true);

    $col_posy = 40;
    $pdf->SetY($col_posy);
    $pdf->SetFont('Arial','',11);

    $pdf->SetTextColor(0,0,0);

    $col_posx = 15;
    $col_posy = 44;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(5,5,"CLIENTE",0,1);

    $col_posx = 15;
    $col_posy += 7;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Cliente:_____________________ Teléfono:____________________ Responsable:____________________");
    $pdf->MultiCell(0,5,$txt);

    $col_posx = 15;
    $col_posy += 7;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Dirección:___________________ Ciudad:_____________________ Departamento:___________________");
    $pdf->MultiCell(0,5,$txt);

    $col_posx = 15;
    $col_posy += 15;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(5,5,"PERSONAL",0,1);

    $col_posx = 15;
    $col_posy += 7;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("Técnico:_____________________ Técnico:_____________________ Técnico:_____________________ ");
    $pdf->MultiCell(0,5,$txt);

    $col_posy += 12;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(5,5,"TIPO DE EQUIPO",0,1);

    $pdf->SetFont('Arial','',11);

    $col_posy += 7;

    $pdf->SetY($col_posy);
    $txt = utf8_decode("    Presión                        Sumergible                        Contra incendios                        Elevación  ");
    $pdf->MultiCell(0,5,$txt);


    $col_posx = 15;
    $col_posy += 13;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(5,5,"TIPO DE MANTENIMIENTO",0,1);
    $col_posy += 8;
    $pdf->SetY($col_posy);

    $pdf->SetFont('Arial','',11);
    $txt = utf8_decode("    Mant.Preventivo                        Mant.Correctivo                        Inspección                        Emergencia  ");
    $pdf->MultiCell(0,5,$txt);


    $col_posx = 40;
    $col_posy = 99;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx += 40;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx += 50;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx += 45;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx = 45;
    $col_posy = 120;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx += 55;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx += 45;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx += 45;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5," ",1,1);

    $col_posx = 15;
    $col_posy += 11;
    $col_width = 37;
    $col_height = 10;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Marca"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("HP"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Voltaje"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Amperaje"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Tablero de control"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Protección"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Tanque hidro"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Capacidad"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Presión de trabajo"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Precarga"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Flotador eléctrico"),1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Parte hidráulica"),1,1);

    $col_posx += $col_width;
    $col_posy = 131;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Bomba 1"),1,1,"C",true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);

    $col_posx += $col_width;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Bomba 2"),1,1,"C",true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);

    $col_posx += $col_width;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Bomba 3"),1,1,"C",true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);


    $col_posx += $col_width;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $pdf->SetFillColor(255,255,255);

    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height,utf8_decode("Bomba 4"),1,1,"C",true);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);
    $pdf->SetX($col_posx);
    $pdf->Cell($col_width,$col_height," ",1,1);

    $col_posx = 15;
    $col_posy = 275;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $txt = utf8_decode('Observaciones:
 ________________________________________________________
 ________________________________________________________
 ________________________________________________________
 ________________________________________________________
 ________________________________________________________
 ________________________________________________________
 ________________________________________________________
 ________________________________________________________
    ');
    $pdf->MultiCell(0,5,$txt);

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

    $pdf->SetFont('Arial','',10);
    $pdf->SetTextColor(100,50,50);
    $col_posy = 34;
    $col_posx = 31;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $nameClientP = limit_size_words($array_info[1]["nameClient"],0,20);
    $pdf->Cell(40,40,utf8_decode($nameClientP),0,1,'L');

    $col_posx = 92;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $phoneClientP = limit_size_words($array_info[1]["phoneClient"],0,20);
    $pdf->Cell(40,40,utf8_decode($phoneClientP),0,1,'L');

    $col_posx = 160;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $personInChargeP = limit_size_words($array_info[1]["personInCharge"],0,20);
    $pdf->Cell(40,40,utf8_decode($personInChargeP),0,1,'L');

    $col_posy = 41;
    $col_posx = 33;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);

    $addressP = limit_size_words($array_info[0]["address"],0,18);
    $pdf->Cell(40,40,utf8_decode($addressP),0,1,'L');

    $col_posx = 90;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $cityP = limit_size_words($array_info[0]["city"],0,20);
    $pdf->Cell(40,40,utf8_decode($cityP),0,1,'L');

    $col_posx = 161;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $departmentP = limit_size_words($array_info[0]["department"],0,20);
    $pdf->Cell(40,40,utf8_decode($departmentP),0,1,'L');

    $col_posy = 63;
    $col_posx = 32;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $tech1 = limit_size_words($array_info[10]["TechnicalUser"],0,20);
    $pdf->Cell(40,40,utf8_decode($tech1),0,1,'L');

    $col_posx = 92;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $tech2 = limit_size_words($array_info[11]["TechnicalUser"],0,20);
    $pdf->Cell(40,40,utf8_decode($tech2),0,1,'L');

    $col_posx = 154;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $tech3 = limit_size_words($array_info[12]["TechnicalUser"],0,20);
    $pdf->Cell(40,40,utf8_decode($tech3),0,1,'L');

    $col_posy = 82;

    if($array_info[3]["pumpType"] == "Presión"){
      $col_posx = 40;
    }
    else if($array_info[3]["pumpType"] == "Sumergible"){
      $col_posx = 80;
    }
    else if($array_info[3]["pumpType"] == "Contra Incendios"){
      $col_posx = 130;
    }
    else if($array_info[3]["pumpType"] == "Elevación"){
      $col_posx = 175;
    }

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode("X"),0,1,'L');

    $col_posy = 102;

    if($array_info[0]["idTypeMaintenance"] == 1){
      $col_posx = 45;
    }
    else if($array_info[0]["idTypeMaintenance"] == 2){
      $col_posx = 100;
    }
    else if($array_info[0]["idTypeMaintenance"] == 3){
      $col_posx = 145;
    }
    else if($array_info[0]["idTypeMaintenance"] == 4){
      $col_posx = 190;
    }

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode("X"),0,1,'L');

    $col_posy = 125;
    $col_posx = 55;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[3]["Brand"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[3]["hp"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[3]["voltage"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[3]["amps"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[2]["controlPanel"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[2]["protection"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[2]["hydroTank"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[3]["capacity"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[2]["workPressure"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[2]["preload"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[2]["electricFloat"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[2]["hydraulicPart"]),0,1,'L');

    $col_posy = 125;
    $col_posx = 95;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[5]["Brand"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[5]["hp"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[5]["voltage"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[5]["amps"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[4]["controlPanel"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[4]["protection"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[4]["hydroTank"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[5]["capacity"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[4]["workPressure"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[4]["preload"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[4]["electricFloat"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[4]["hydraulicPart"]),0,1,'L');

    $col_posy = 125;
    $col_posx = 130;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[7]["Brand"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[7]["hp"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[7]["voltage"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[7]["amps"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[6]["controlPanel"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[6]["protection"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[6]["hydroTank"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[7]["capacity"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[6]["workPressure"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[6]["preload"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[6]["electricFloat"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[6]["hydraulicPart"]),0,1,'L');

    $col_posy = 125;
    $col_posx = 165;

    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[9]["Brand"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[9]["hp"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[9]["voltage"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[9]["amps"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[8]["controlPanel"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[8]["protection"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[8]["hydroTank"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[9]["capacity"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[8]["workPressure"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[8]["preload"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[8]["electricFloat"]),0,1,'L');

    $col_posy += 10;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(40,40,utf8_decode($array_info[8]["hydraulicPart"]),0,1,'L');

    $col_posy = 280;
    $col_posx = 15;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $obsP = limit_size_words($array_info[0]["observations"],0,480);
    $pdf->MultiCell(120,5,utf8_decode($obsP));

    $col_posy = 330;
    $col_posx = 49;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5,utf8_decode($array_info[0]["startTime"]),0,1,'L');

    $col_posx = 107;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    $pdf->Cell(5,5,utf8_decode($array_info[0]["endTime"]),0,1,'L');

    $col_posy = 270;
    $col_posx = 180;
    $pdf->SetY($col_posy);
    $pdf->SetX($col_posx);
    try{    
        $name_element = explode("/",$array_info[1]["clientFirmPath"]);
        $name_element = $name_element[count($name_element)-1];
        $user_firm = URL_BASE."tecnisystems_reports/documents/firms/".$name_element;
        $pdf->Image($user_firm,152,292,35,35);
    } catch (Exception $e) {
    	$pdf->Cell(35,5,utf8_decode(" "),0,1,'L'); 
	}
	
	// Limpiar cualquier contenido del búfer de salida
    ob_end_clean();
    
	header('Content-type: application/pdf');
    $pdf->Output();
}