/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chart_co2", am4charts.XYChart);

chart.data = [{
  "year": "1994",
  "CO2": 1587,
  "800ppm": 800
},{
  "year": "1994-01-03",
  "CO2": 1300,
  "800ppm": 800
}, {
  "year": "1995",
  "CO2": 1567,
  "800ppm": 800
}, {
  "year": "1996",
  "CO2": 617,
  "800ppm": 800
}, {
  "year": "1997",
  "CO2": 630,
  "800ppm": 800
}, {
  "year": "1998",
  "CO2": 660,
  "800ppm": 800
}, {
  "year": "1999",
  "CO2": 683,
  "800ppm": 800
}, {
  "year": "2000",
  "CO2": 691,
  "800ppm": 800
}, {
  "year": "2001",
  "CO2": 298,
  "800ppm": 800
}, {
  "year": "2002",
  "CO2": 275,
  "800ppm": 800
}, {
  "year": "2003",
  "CO2": 400,
  "800ppm": 800
}, {
  "year": "2004",
  "CO2": 318,
  "800ppm": 800
}, {
  "year": "2005",
  "CO2": 313,
  "800ppm": 800
}, {
  "year": "2006",
  "CO2": 499,
  "800ppm": 800
}, {
  "year": "2007",
  "CO2": 410,
  "800ppm": 800
}, {
  "year": "2008",
  "CO2": 465,
  "800ppm": 800
}, {
  "year": "2009",
  "CO2": 445,
  "800ppm": 800
}, {
  "year": "2010",
  "CO2": 463,
  "800ppm": 800
}, {
  "year": "2011",
  "CO2": 480,
  "800ppm": 800
}, {
  "year": "2012",
  "CO2": 359,
  "800ppm": 800
}];

chart.dateFormatter.inputDateFormat = "yyyy-mm-dd";
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 60;
dateAxis.startLocation = 0.5;
dateAxis.endLocation = 0.5;
dateAxis.baseInterval = {
  timeUnit: "day",
  count: 1
}

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.tooltip.disabled = true;


/* == COURBE BLEU VALEURS CO2 == */
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.dateX = "year";
series.name = "CO2 de la pièce en PPM";
series.dataFields.valueY = "CO2";
series.tooltipHTML = "<img src='../../images/CO2.png' style='vertical-align:bottom; margin-right: 10px; width:35px; height:28px;'><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
series.tooltipText = "[#000]{valueY.value}[/]";
series.tooltip.background.fill = am4core.color("#FFF");
series.tooltip.getStrokeFromObject = true;
series.tooltip.background.strokeWidth = 3;
series.tooltip.getFillFromObject = false;
series.fillOpacity = 0.6;
series.strokeWidth = 2;
//series.fill = am4core.color("green"); // changer la couleur de remplissage
series.stacked = false; //false sinon les courbes ne peuvent pas se superposer


/* == LIMITE ROUGE A NE PAS DEPASSER == */
var series2 = chart.series.push(new am4charts.LineSeries());
series2.name = "Limite à ne pas dépasser";
series2.dataFields.dateX = "year";
series2.dataFields.valueY = "800ppm";
series2.tooltipHTML = "<img src='../../images/danger.png' style='vertical-align:bottom; margin-right: 10px; width:26px; height:28px;'><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
series2.tooltipText = "[#000]{valueY.value}[/]";
series2.tooltip.background.fill = am4core.color("#FFF");
series2.tooltip.getFillFromObject = false;
series2.tooltip.getStrokeFromObject = true;
series2.tooltip.background.strokeWidth = 3;
series2.stroke = am4core.color("red"); //ligne de couleur rouge
series2.sequencedInterpolation = true;
//series2.fillOpacity = 0.6; remplir avec de la couleur
series2.defaultState.transitionDuration = 1000;
series2.strokeWidth = 3; //épaisseur de la ligne
series2.stacked = false; //false sinon les courbes ne peuvent pas se superposer


/* == CURSEUR == */
chart.cursor = new am4charts.XYCursor();
chart.cursor.xAxis = dateAxis;
chart.scrollbarX = new am4core.Scrollbar();


/* == LEGENDE DU GRAPHIQUE == */
chart.legend = new am4charts.Legend();
chart.legend.position = "top";