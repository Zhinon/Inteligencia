<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

$eje_x = unserialize($_GET['eje_x']);
$datay1 = unserialize($_GET['w1']);
$datay2 = unserialize($_GET['w2']);
$datay3 = unserialize($_GET['w3']);
$datay4 = unserialize($_GET['w4']);
$datay5 = unserialize($_GET['w5']);
$datay6 = unserialize($_GET['w6']);
$datay7 = unserialize($_GET['w7']);
$datay8 = unserialize($_GET['w8']);
$datay9 = unserialize($_GET['w9']);
$datay10 = unserialize($_GET['w10']);
$datay11 = unserialize($_GET['w11']);
$datay12 = unserialize($_GET['w12']);
$datay13 = unserialize($_GET['w13']);

// Setup the graph
$graph = new Graph(1000,500);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Pesos de w');
$graph->SetBox(false);

$graph->SetMargin(40,20,36,63);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($eje_x);
$graph->xgrid->SetColor('#E3E3E3');

$graph->SetAxisStyle(AXSTYLE_BOXIN);
// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#7B241C");
$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p1->mark->SetColor("#7B241C");
$p1->mark->SetFillColor("#7B241C");

$p1->SetLegend('W 1');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#F5B7B1");
$p2->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p2->mark->SetColor("#F5B7B1");
$p2->mark->SetFillColor("#F5B7B1");

$p2->SetLegend('W 2');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#633974");
$p3->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p3->mark->SetColor("#633974");
$p3->mark->SetFillColor("#633974");

$p3->SetLegend('W 3');

// Create the forth line
$p4 = new LinePlot($datay4);
$graph->Add($p4);
$p4->SetColor("#1A5276");
$p4->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p4->mark->SetColor("#1A5276");
$p4->mark->SetFillColor("#1A5276");

$p4->SetLegend('W 4');

// Create the third line
$p5 = new LinePlot($datay5);
$graph->Add($p5);
$p5->SetColor("#AED6F1");
$p5->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p5->mark->SetColor("#AED6F1");
$p5->mark->SetFillColor("#AED6F1");

$p5->SetLegend('W 5');

// Create the third line
$p6 = new LinePlot($datay6);
$graph->Add($p6);
$p6->SetColor("#117864");
$p6->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p6->mark->SetColor("#117864");
$p6->mark->SetFillColor("#117864");

$p6->SetLegend('W 6');

// Create the third line
$p7 = new LinePlot($datay7);
$graph->Add($p7);
$p7->SetColor("#ABEBC6");
$p7->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p7->mark->SetColor("#ABEBC6");
$p7->mark->SetFillColor("#ABEBC6");

$p7->SetLegend('W 7');

// Create the third line
$p8 = new LinePlot($datay8);
$graph->Add($p8);
$p8->SetColor("#145A32");
$p8->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p8->mark->SetColor("#145A32");
$p8->mark->SetFillColor("#145A32");

$p8->SetLegend('W 8');

// Create the third line
$p9 = new LinePlot($datay9);
$graph->Add($p9);
$p9->SetColor("#F9E79F");
$p9->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p9->mark->SetColor("#F9E79F");
$p9->mark->SetFillColor("#F9E79F");

$p9->SetLegend('W 9');

// Create the third line
$p10 = new LinePlot($datay10);
$graph->Add($p10);
$p10->SetColor("#9A7D0A");
$p10->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p10->mark->SetColor("#9A7D0A");
$p10->mark->SetFillColor("#9A7D0A");

$p10->SetLegend('W 10');

// Create the third line
$p11 = new LinePlot($datay11);
$graph->Add($p11);
$p11->SetColor("#F39C12");
$p11->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p11->mark->SetColor("#F39C12");
$p11->mark->SetFillColor("#F39C12");

$p11->SetLegend('W 11');

// Create the third line
$p12 = new LinePlot($datay12);
$graph->Add($p12);
$p12->SetColor("#D35400");
$p12->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p12->mark->SetColor("#D35400");
$p12->mark->SetFillColor("#D35400");

$p12->SetLegend('W 12');

// Create the third line
$p13 = new LinePlot($datay13);
$graph->Add($p13);
$p13->SetColor("#2E4053");
$p13->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p13->mark->SetColor("#2E4053");
$p13->mark->SetFillColor("#2E4053");

$p13->SetLegend('W 13');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>

