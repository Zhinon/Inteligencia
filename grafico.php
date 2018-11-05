<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

$eje_x = unserialize($_GET['eje_x']);
$datay1 = unserialize($_GET['w0']);
$datay2 = unserialize($_GET['w1']);
$datay3 = unserialize($_GET['w2']);

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
$p1->SetColor("#6495ED");
$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p1->mark->SetColor("#6495ED");
$p1->mark->SetFillColor("#6495ED");

$p1->SetLegend('w 0');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p2->mark->SetColor("#B22222");
$p2->mark->SetFillColor("#B22222");

$p2->SetLegend('w 1');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p3->mark->SetColor("#FF1493");
$p3->mark->SetFillColor("#FF1493");

$p3->SetLegend('w 2');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>

