<?php
function template_pdf_electrical($array_info=0){
	$pdf = new FPDF('P','mm','Legal');

	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->Image(".".IMGS.'logo64x64.png',17,10,-100);

  $pdf->SetY(25);
  $pdf->SetX(12);
  $pdf->SetFont('Arial','B',9);
  $txt = utf8_decode('Tecnisystems S.A.S.');
  $pdf->MultiCell(0,5,$txt);

  $pdf->SetY(12);
  $pdf->SetFont('Arial','B',12);
	$pdf->Cell(40);
	$txt = utf8_decode('      Calle 14 N°.54-39 Piso 2
	Cels: 310 628 1704 / 316 466 9197
	                 Tel: 702 5798');

	$pdf->MultiCell(0,5,$txt);
	$pdf->Ln();

	$pdf->SetTextColor(220,50,50);
	$txt = utf8_decode('INFORME DE MANTENIMIENTO
	    DE PLANTAS ELÉCTRICAS');

	$pdf->SetY(10);
	$pdf->SetX(-80);
	$pdf->MultiCell(0,5,$txt);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

  $col_posy = 22;
  $col_posx = -65;
  $pdf->SetFont('Arial','',9);
  $pdf->SetFillColor(230,230,0);
  $pdf->SetTextColor(220,50,50);
  $pdf->SetY($col_posy);
  $pdf->SetX($col_posx);
  $pdf->Cell(40,10,utf8_decode($array_info[0]["serialNumberER"]),1,1,'C',true);
  $pdf->Ln();

	$pdf->SetFont('Arial','',11);

	$pdf->SetTextColor(0,0,0);
	$txt = utf8_decode(" Ciudad: ________________________ Fecha:__________________ Empresa:____________________
	Dirección: ______________________ Teléfono:________________ Encargado:____________________
	Planta Eléctrica: _________________ Modelo:_________________ Serie:_________________________
	Motor: _________________________ Modelo:_________________ Serie:_________________________
	Generador: _____________________ Serie:__________________ Kw/Kva:___/___ Fases: ___ Volt: ___
		");

	$pdf->MultiCell(0,5,$txt);
	$pdf->SetY(75);
	$pdf->SetFont('Arial','B',11);

	$txt = utf8_decode("N° Inventario Planta:_____________________________________");
	$pdf->MultiCell(0,5,$txt);

	$pdf->Ln();
	$pdf->Cell(5,5,"1. PERSONAL",0,1);

	$pdf->SetY(90);
	$pdf->SetFont('Arial','',11);
	$txt = utf8_decode("Técnico:_____________________ Técnico:_____________________ Técnico:_____________________ ");
	$pdf->MultiCell(0,5,$txt);

	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(5,5,utf8_decode("2. TRABAJOS EJECUTADOS CON PLANTA ELÉCTRICA APAGADA"),0,1);

	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(60,5,utf8_decode("Sistema de lubricación"),1,1,'C',true);
	$pdf->Cell(60,5,utf8_decode("Si    No"),0,1,'R');
	$pdf->SetFont('Arial','',11);
	$txt = utf8_decode("Revisión de conexiones
	Revisión de filtros
	Cambio de filtros
	Verificación estado y
	nivel aceite
	Cambio de aceite");
	$pdf->MultiCell(0,5,$txt);

	$pdf->SetY(115);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(115);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(120);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(120);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(125);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(125);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(135);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(135);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(140);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(140);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(105);
	$pdf->SetX(72);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(60,5,utf8_decode("Sistema de combustible"),1,1,'C',true);
	$pdf->SetX(72);
	$pdf->Cell(60,5,utf8_decode("Si    No"),0,1,'R');
	$pdf->SetFont('Arial','',11);
	$pdf->SetX(72);
	$txt = utf8_decode("Revisión de fugas
	Revisión de conexiones
	Revisión filtro separador
	Revisión bomba auxiliar
	o bombin
	Revisión tanque combus..");
	$pdf->MultiCell(0,5,$txt);

	$pdf->SetY(115);
	$pdf->SetX(117);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(115);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(120);
	$pdf->SetX(117);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(120);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(125);
	$pdf->SetX(117);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(125);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(135);
	$pdf->SetX(117);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(135);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(140);
	$pdf->SetX(117);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(140);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(105);
	$pdf->SetX(134);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(60,5,utf8_decode("Sistema admisión aire"),1,1,'C',true);
	$pdf->SetX(134);
	$pdf->Cell(60,5,utf8_decode("Si    No"),0,1,'R');
	$pdf->SetFont('Arial','',11);
	$pdf->SetX(134);
	$txt = utf8_decode("Revisión de conexión
	Revisión carcasa y filtro
	Revisión turbo ");
	$pdf->MultiCell(0,5,$txt);

	$pdf->SetY(115);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(115);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(120);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(120);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(125);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(125);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(148);
	$pdf->SetX(10);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(60,5,utf8_decode("Sistema de enfriamiento"),1,1,'C',true);
	$pdf->Cell(60,5,utf8_decode("Si    No"),0,1,'R');
	$pdf->SetFont('Arial','',11);
	$txt = utf8_decode("Revisión de conexiones
	Revisión estado correas
	Verificación estado y
	nivel de refrigerante
	Revisión estado radiador
	Revisión sensor nivel
	de agua");
	$pdf->MultiCell(0,5,$txt);

	$pdf->SetY(158);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(158);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(163);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(163);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(168);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(168);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(179);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(179);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(184);
	$pdf->SetX(55);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(184);
	$pdf->SetX(64);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(148);
	$pdf->SetX(72);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(60,5,utf8_decode("Sistema corriente directa"),1,1,'C',true);
	$pdf->SetX(72);
	$pdf->Cell(60,5,utf8_decode("Si    No"),0,1,'R');
	$pdf->SetFont('Arial','',11);
	$pdf->SetX(72);
	$txt = utf8_decode("Revisión correa alternador
	Revisión de conexiones
	electricas
	Verificación estado y nivel
	de acido de la bateria
	Revisión bornes bateria
	y carga
	Revisión cargador bateria");
	$pdf->MultiCell(0,5,$txt);

	$pdf->SetY(158);
	$pdf->SetX(118);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(158);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(163);
	$pdf->SetX(118);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(163);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(173);
	$pdf->SetX(118);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(173);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(184);
	$pdf->SetX(118);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(184);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(193);
	$pdf->SetX(118);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(193);
	$pdf->SetX(126);
	$pdf->Cell(5,5," ",1,1);


	$pdf->SetY(135);
	$pdf->SetX(134);
	$pdf->SetFont('Arial','B',11);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(60,5,utf8_decode("Sistema corriente alterna"),1,1,'C',true);
	$pdf->SetX(134);
	$pdf->Cell(60,5,utf8_decode("Si    No"),0,1,'R');
	$pdf->SetFont('Arial','',11);
	$pdf->SetX(134);
	$txt = utf8_decode("Revisión voltimetro
	Revisión frecuencímetro
	Revisión amperimetro
	Revisión conexión y
	terminales electricas
	Revisión breakers
	Revisión contactores
	Revisión cables de
	potencia
	");
	$pdf->MultiCell(0,5,$txt);

	$pdf->SetY(145);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(145);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(150);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(150);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(155);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(155);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(165);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(165);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(170);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(170);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(175);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(175);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->SetY(180);
	$pdf->SetX(179);
	$pdf->Cell(5,5," ",1,1);
	$pdf->SetY(180);
	$pdf->SetX(188);
	$pdf->Cell(5,5," ",1,1);

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(5,5,utf8_decode("2. TRABAJOS EJECUTADOS CON PLANTA ELÉCTRICA APAGADA"),0,1);
	$pdf->SetY(207);
	$pdf->Cell(5,5,utf8_decode("PRUEBAS EN VACIO:"),0,1);

	$pdf->SetFont('Arial','',11);

	$pdf->SetY(207);
	$pdf->SetX(55);
	$txt = utf8_decode("VL1-N ________ VL2-N ________ VL3-N ________ VL-L ________ Hz _______ ");
	$pdf->MultiCell(0,5,$txt);

	$txt = utf8_decode("Corriente de arranque CC _____________ Bateria:Voltaje _______________ Amperios _______________
	Presión aceite motor _________________ Temperatura Motor ____________ RPM __________________");
	$pdf->MultiCell(0,5,$txt);



	$pdf->SetY(225);
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(5,5,utf8_decode("PRUEBAS CON CARGA:"),0,1);
	$pdf->SetFont('Arial','',11);

	$pdf->SetY(225);
	$pdf->SetX(60);
	$txt = utf8_decode("VL1-N _______ VL2-N _______ VL3-N ________ VL-L _______ Hz _______ ");
	$pdf->MultiCell(0,5,$txt);

	$txt = utf8_decode("Al1 _________ Al2 _________ Al3 _________ Bateria:Voltaje _____________ Amperios _____________
	Presión aceite motor __________________ Temperatura Motor ____________ RPM _________________
	Lectura Horómetro: Anterior ____________ Actual _____________");
	$pdf->MultiCell(0,5,$txt);

	$pdf->Ln();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(5,5,utf8_decode("Funcionamiento transferencia de carga:_________________ Nivel combustible: _________________"),0,1);


	$pdf->Ln();
	$pdf->SetFont('Arial','',11);
	$txt = utf8_decode("Observaciones:");
	$pdf->MultiCell(0,5,$txt);

	$pdf->SetY(260);
	$pdf->SetX(37);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(30,5,utf8_decode("____________________________________________________________________________"),0,1,'L');
	$pdf->SetY(265);
	$pdf->SetX(37);
	$pdf->Cell(30,5,utf8_decode("____________________________________________________________________________"),0,1,'L');
	$pdf->SetY(270);
	$pdf->SetX(37);
	$pdf->Cell(30,5,utf8_decode("____________________________________________________________________________"),0,1,'L');
	$pdf->SetY(275);
	$pdf->SetX(37);
	$pdf->Cell(30,5,utf8_decode("____________________________________________________________________________"),0,1,'L');

	$pdf->SetY(285);
	$pdf->SetFillColor(230,230,0);
	$pdf->Cell(30,5,utf8_decode("Material"),1,1,'C',true);
	$pdf->SetY(285);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode("Cantidad"),1,1,'C',true);
	$pdf->SetY(285);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode("Referencia"),1,1,'C',true);

	$pdf->Cell(30,5,utf8_decode("F.aceite"),1,1,'L');
	$pdf->SetY(290);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');
	$pdf->SetY(290);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');

	$pdf->Cell(30,5,utf8_decode("F.combustible"),1,1,'L');
	$pdf->SetY(295);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');
	$pdf->SetY(295);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');

	$pdf->Cell(30,5,utf8_decode("F.aire"),1,1,'L');
	$pdf->SetY(300);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');
	$pdf->SetY(300);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');

	$pdf->Cell(30,5,utf8_decode("F.separador"),1,1,'L');
	$pdf->SetY(305);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');
	$pdf->SetY(305);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');

	$pdf->Cell(30,5,utf8_decode("Refrigerante"),1,1,'L');
	$pdf->SetY(310);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');
	$pdf->SetY(310);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');

	$pdf->Cell(30,5,utf8_decode("Aceite Motor"),1,1,'L');
	$pdf->SetY(315);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');
	$pdf->SetY(315);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');

	$pdf->Cell(30,5,utf8_decode("Otros"),1,1,'L');
	$pdf->SetY(320);
	$pdf->SetX(40);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');
	$pdf->SetY(320);
	$pdf->SetX(70);
	$pdf->Cell(30,5,utf8_decode(""),1,1,'C');

	$pdf->SetY(330);
	$pdf->Cell(30,5,utf8_decode("H. DE ENTRADA: __________ H. DE SALIDA: __________"),0,1,'L');

	$pdf->SetY(285);
	$pdf->SetX(155);
	$pdf->Cell(30,5,utf8_decode("Recibí a conformidad"),0,1,'C');
	$pdf->SetX(150);
	$pdf->Cell(40,40,utf8_decode(""),1,1,'L');
	$pdf->SetX(155);
	$pdf->Cell(30,5,utf8_decode("Firma cliente"),0,1,'C');

	$col_posy = 40;
	$col_posx = 27;

	$pdf->SetTextColor(100,50,50);
	$pdf->SetFont('Arial','',10);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$cD = limit_size_words($array_info[6]["city"]."/".$array_info[6]["department"],0,24);
	$pdf->Cell(35,10,utf8_decode($cD),0,1,'L');
	$col_posx = 92;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[0]["date_general"]),0,1,'L');
	$col_posx = 150;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$nameClient = limit_size_words($array_info[5]["nameClient"],0,20);
	$pdf->Cell(35,10,utf8_decode($nameClient),0,1,'L');
	$col_posy = 45;
	$col_posx = 31;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$address = limit_size_words($array_info[0]["address"],0,20);
	$pdf->Cell(35,10,utf8_decode($address),0,1,'L');
	$col_posx = 95;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$phoneClient = limit_size_words($array_info[5]["phoneClient"],0,20);
	$pdf->Cell(35,10,utf8_decode($phoneClient),0,1,'L');
	$col_posx = 152;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$personInCharge = limit_size_words($array_info[5]["personInCharge"],0,20);
	$pdf->Cell(35,10,utf8_decode($personInCharge),0,1,'L');
	$col_posy = 50;
	$col_posx = 41;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$powerPlant = limit_size_words($array_info[2]["powerPlant"],0,20);
	$pdf->Cell(35,10,utf8_decode($powerPlant),0,1,'L');
	$col_posx = 95;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$powerPlantModel = limit_size_words($array_info[2]["powerPlantModel"],0,20);
	$pdf->Cell(35,10,utf8_decode($powerPlantModel),0,1,'L');
	$col_posx = 141;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$powerPlantSerie = limit_size_words($array_info[2]["powerPlantSerie"],0,20);
	$pdf->Cell(35,10,utf8_decode($powerPlantSerie),0,1,'L');
	$col_posy = 55;
	$col_posx = 25;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$motor = limit_size_words($array_info[2]["motor"],0,20);
	$pdf->Cell(35,10,utf8_decode($motor),0,1,'L');
	$col_posx = 95;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$motorModel = limit_size_words($array_info[2]["motorModel"],0,20);
	$pdf->Cell(35,10,utf8_decode($motorModel),0,1,'L');
	$col_posx = 141;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$motorSerie = limit_size_words($array_info[2]["motorSerie"],0,20);
	$pdf->Cell(35,10,utf8_decode($motorSerie),0,1,'L');
	$col_posy = 60;
	$col_posx = 33;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$generator = limit_size_words($array_info[2]["generator"],0,20);
	$pdf->Cell(35,10,utf8_decode($generator),0,1,'L');
	$col_posx = 93;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$generatorSerie = limit_size_words($array_info[2]["generatorSerie"],0,20);
	$pdf->Cell(35,10,utf8_decode($generatorSerie),0,1,'L');
	$col_posx = 143;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$generatorKw = limit_size_words($array_info[2]["generatorKw"],0,3);
	$pdf->Cell(35,10,utf8_decode($generatorKw),0,1,'L');
	$col_posx = 151;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$generatorKwa = limit_size_words($array_info[2]["generatorKwa"],0,3);
	$pdf->Cell(35,10,utf8_decode($generatorKwa),0,1,'L');
	$col_posx = 171;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$generatorPhases = limit_size_words($array_info[2]["generatorPhases"],0,3);
	$pdf->Cell(35,10,utf8_decode($generatorPhases),0,1,'L');
	$col_posx = 187;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$generatorVolt = limit_size_words($array_info[2]["generatorVolt"],0,3);
	$pdf->Cell(35,10,utf8_decode($generatorVolt),0,1,'L');
	$col_posy = 73;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["serialProduct"]),0,1,'L');
	$col_posy = 88;
	$col_posx = 26;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$TechnicalUser1 = limit_size_words($array_info[7]["TechnicalUser"],0,20);
	$pdf->Cell(35,10,utf8_decode($TechnicalUser1 ),0,1,'L');

	$col_posx = 87;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$TechnicalUser2 = limit_size_words($array_info[8]["TechnicalUser"],0,20);
	$pdf->Cell(35,10,utf8_decode($TechnicalUser2 ),0,1,'L');

	$col_posx = 148;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$TechnicalUser3 = limit_size_words($array_info[9]["TechnicalUser"],0,20);
	$pdf->Cell(35,10,utf8_decode($TechnicalUser3 ),0,1,'L');

	$col_posy = 112;
	$col_posx = recalculate_position(40,$array_info[1]["ls_connectionCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 117;
	$col_posx = recalculate_position(40,$array_info[1]["filterCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 122;
	$col_posx = recalculate_position(40,$array_info[1]["filterChanges"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 132;
	$col_posx = recalculate_position(40,$array_info[1]["conditionCheckAndOilLevel"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 137;
	$col_posx = recalculate_position(40,$array_info[1]["oilChanges"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 112;
	$col_posx = recalculate_position(102,$array_info[1]["leakCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 117;
	$col_posx = recalculate_position(102,$array_info[1]["fs_connectionCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 122;
	$col_posx = recalculate_position(102,$array_info[1]["filterSeparatorReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 132;
	$col_posx = recalculate_position(102,$array_info[1]["auxiliaryPumpOrCylinderCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 137;
	$col_posx = recalculate_position(102,$array_info[1]["fuelTankCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 112;
	$col_posx = recalculate_position(164,$array_info[1]["connectionReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 117;
	$col_posx = recalculate_position(164,$array_info[1]["casingAndFilterCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 122;
	$col_posx = recalculate_position(164,$array_info[1]["turboReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 155;
	$col_posx = recalculate_position(40,$array_info[1]["cs_connectionCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 160;
	$col_posx = recalculate_position(40,$array_info[1]["checkConditionStraps"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 165;
	$col_posx = recalculate_position(40,$array_info[1]["conditionCheckAndCoolantLevel"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 177;
	$col_posx = recalculate_position(40,$array_info[1]["radiatorConditionCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 182;
	$col_posx = recalculate_position(40,$array_info[1]["waterLevelSensorCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 155;
	$col_posx = recalculate_position(103,$array_info[1]["alternatorBeltCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 160;
	$col_posx = recalculate_position(103,$array_info[1]["checkElectricalConnections"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 170;
	$col_posx = recalculate_position(103,$array_info[1]["batteryStatusAndAcidLevelCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 182;
	$col_posx = recalculate_position(103,$array_info[1]["checkBatteryAndChargeTerminals"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 191;
	$col_posx = recalculate_position(103,$array_info[1]["batteryChargerReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 143;
	$col_posx = recalculate_position(164,$array_info[1]["voltmeterReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 148;
	$col_posx = recalculate_position(164,$array_info[1]["frequencyMeterReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 153;
	$col_posx = recalculate_position(164,$array_info[1]["ammeterReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 163;
	$col_posx = recalculate_position(164,$array_info[1]["checkElectricalConnectionsAndTerminals"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 168;
	$col_posx = recalculate_position(164,$array_info[1]["breakerReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 173;
	$col_posx = recalculate_position(164,$array_info[1]["contactorsReview"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 178;
	$col_posx = recalculate_position(164,$array_info[1]["powerCableCheck"]);
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode("X"),0,1,'C');

	$col_posy = 205;
	$col_posx = 68;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyVl1N = limit_size_words($array_info[3]["empty_vl1N"],0,7);
	$pdf->Cell(35,10,utf8_decode($emptyVl1N),0,1,'L');

	$col_posx = 99;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyVl2N = limit_size_words($array_info[3]["empty_vl2N"],0,7);
	$pdf->Cell(35,10,utf8_decode($emptyVl2N),0,1,'L');

	$col_posx = 129;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyVl3N = limit_size_words($array_info[3]["empty_vl3N"],0,7);
	$pdf->Cell(35,10,utf8_decode($emptyVl3N),0,1,'L');

	$col_posx = 157;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyVlL = limit_size_words($array_info[3]["empty_vlL"],0,7);
	$pdf->Cell(35,10,utf8_decode($emptyVlL),0,1,'L');

	$col_posx = 182;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyHz = limit_size_words($array_info[3]["empty_hz"],0,7);
	$pdf->Cell(35,10,utf8_decode($emptyHz),0,1,'L');

	$col_posy = 210;
	$col_posx = 58;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyStartingCurrentCC = limit_size_words($array_info[3]["empty_startingCurrentCC"],0,10);
	$pdf->Cell(35,10,utf8_decode($emptyStartingCurrentCC),0,1,'L');

	$col_posx = 113;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyBatteryVoltage = limit_size_words($array_info[3]["empty_batteryVoltage"],0,10);
	$pdf->Cell(35,10,utf8_decode($emptyBatteryVoltage),0,1,'L');

	$col_posx = 163;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyAmps = limit_size_words($array_info[3]["empty_amps"],0,10);
	$pdf->Cell(35,10,utf8_decode($emptyAmps),0,1,'L');

	$col_posy = 215;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyEngineOilPressure = limit_size_words($array_info[3]["empty_engineOilPressure"],0,10);
	$pdf->Cell(35,10,utf8_decode($emptyEngineOilPressure),0,1,'L');

	$col_posx = 122;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyEngineTemperature = limit_size_words($array_info[3]["empty_engineTemperature"],0,10);
	$pdf->Cell(35,10,utf8_decode($emptyEngineTemperature),0,1,'L');

	$col_posx = 158;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$emptyRPM = limit_size_words($array_info[3]["empty_RPM"],0,10);
	$pdf->Cell(35,10,utf8_decode($emptyRPM),0,1,'L');

	$col_posy = 223;
	$col_posx = 75;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadVl1N = limit_size_words($array_info[4]["load_vl1N"],0,7);
	$pdf->Cell(35,10,utf8_decode($loadVl1N),0,1,'L');

	$col_posx = 103;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadVl2N = limit_size_words($array_info[4]["load_vl2N"],0,7);
	$pdf->Cell(35,10,utf8_decode($loadVl2N),0,1,'L');

	$col_posx = 130;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadVl3N = limit_size_words($array_info[4]["load_vl3N"],0,7);
	$pdf->Cell(35,10,utf8_decode($loadVl3N),0,1,'L');

	$col_posx = 158;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadVlL = limit_size_words($array_info[4]["load_vlL"],0,7);
	$pdf->Cell(35,10,utf8_decode($loadVlL),0,1,'L');

	$col_posx = 179;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadHz = limit_size_words($array_info[4]["load_hz"],0,7);
	$pdf->Cell(35,10,utf8_decode($loadHz),0,1,'L');

	$col_posy = 228;
	$col_posx = 18;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadAl1 = limit_size_words($array_info[4]["load_al1"],0,9);
	$pdf->Cell(35,10,utf8_decode($loadAl1),0,1,'L');

	$col_posx = 45;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadAl2 = limit_size_words($array_info[4]["load_al2"],0,9);
	$pdf->Cell(35,10,utf8_decode($loadAl2),0,1,'L');

	$col_posx = 72;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadAl3 = limit_size_words($array_info[4]["load_al3"],0,9);
	$pdf->Cell(35,10,utf8_decode($loadAl3),0,1,'L');

	$col_posx = 121;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadBatteryVoltage = limit_size_words($array_info[4]["load_batteryVoltage"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadBatteryVoltage),0,1,'L');

	$col_posx = 167;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadAmps = limit_size_words($array_info[4]["load_amps"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadAmps),0,1,'L');

	$col_posy = 233;
	$col_posx = 49;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadEngineOilPressure = limit_size_words($array_info[4]["load_engineOilPressure"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadEngineOilPressure),0,1,'L');

	$col_posx = 123;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadEngineTemperature = limit_size_words($array_info[4]["load_engineTemperature"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadEngineTemperature),0,1,'L');

	$col_posx = 162;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadRPM = limit_size_words($array_info[4]["load_RPM"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadRPM),0,1,'L');

	$col_posy = 238;
	$col_posx = 63;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadPreviousHourMeterReading = limit_size_words($array_info[4]["load_previousHourMeterReading"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadPreviousHourMeterReading),0,1,'L');

	$col_posx = 102;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadCurrentHourMeterReading = limit_size_words($array_info[4]["load_currentHourMeterReading"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadCurrentHourMeterReading),0,1,'L');

	$col_posy = 247;
	$col_posx = 90;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadLoadTransfer = limit_size_words($array_info[4]["load_loadTransfer"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadLoadTransfer),0,1,'L');

	$col_posx = 165;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$loadFullLevel = limit_size_words($array_info[4]["load_fullLevel"],0,10);
	$pdf->Cell(35,10,utf8_decode($loadFullLevel),0,1,'L');

	$col_posy = 260;
	$col_posx = 38;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$obsE = limit_size_words($array_info[0]["observations"],0,330);
	$txt = utf8_decode($obsE);
	$pdf->MultiCell(165,5,$txt);

	$col_posy = 288;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  83;
	$pdf->Cell(35,10,utf8_decode($array_info[2]["oilAmount"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["oilReference"]),0,1,'L');

	$col_posy = 293;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  83;
	$pdf->Cell(35,10,utf8_decode($array_info[2]["fuelAmount"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["fuelReference"]),0,1,'L');

	$col_posy = 298;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  83;
	$pdf->Cell(35,10,utf8_decode($array_info[2]["airAmount"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["airReference"]),0,1,'L');

	$col_posy = 303;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  83;
	$pdf->Cell(35,10,utf8_decode($array_info[2]["separatorAmount"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["separatorReference"]),0,1,'L');

	$col_posy = 308;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  83;
	$pdf->Cell(35,10,utf8_decode($array_info[2]["refrigerantAmount"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["refrigerantReference"]),0,1,'L');

	$col_posy = 313;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  83;
	$pdf->Cell(35,10,utf8_decode($array_info[2]["engineoilAmount"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["engineoilReference"]),0,1,'L');

	$col_posy = 318;
	$col_posx = 50;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  83;
	$pdf->Cell(35,10,utf8_decode($array_info[2]["otherAmount"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,10,utf8_decode($array_info[2]["otherReference"]),0,1,'L');

	$col_posy = 330;
	$col_posx = 45;
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$col_posx =  94;
	$pdf->Cell(35,5,utf8_decode($array_info[0]["startTime"]),0,1,'L');
	$pdf->SetY($col_posy);
	$pdf->SetX($col_posx);
	$pdf->Cell(35,5,utf8_decode($array_info[0]["endTime"]),0,1,'L');

	$pdf->SetY($col_posy-10);
	$pdf->SetX($col_posx+10);
	$name_element = explode("/",$array_info[5]["clientFirmPath"]);
	$name_element = $name_element[count($name_element)-1];
	$user_firm = URL_BASE."tecnisystems_reports/documents/firms/".$name_element;
	$pdf->Image($user_firm,150,290,30,30);

	$pdf->Output();

}


function recalculate_position($yes,$num){
	$pos = $yes;
	if ($num != 1) {
		$pos += 9;
	}
	return $pos;
}
?>
