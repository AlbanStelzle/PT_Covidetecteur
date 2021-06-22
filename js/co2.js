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

let chart = am4core.create("chart_co2", am4charts.XYChart);
let dateAxis = chart.xAxes.push(new am4charts.DateAxis());

let status = true;


chart.data = [];
let data = [];
let radios = document.getElementsByName('btnradio');
function getWhen(){
	let valeur;

	for(let i = 0; i < radios.length; i++){
		if(radios[i].checked){
			valeur = radios[i].value;

		}
	}
	return valeur;
}
attributeData();

function attributeData(){
	let dataDay =[];

	let when = getWhen();
	data = [];
	if(when === "day"){
		let date = new Date();

		date.setHours(0);
		date.setMinutes(0);
		date.setSeconds(0);
		let min = date.getTime();

		date.setHours(23);
		date.setMinutes(59);
		date.setSeconds(59);
		let max = date.getTime()

		console.log(" avant : " +new Date(min)+ " max : "+new Date(max));
		for(let i = 0; i < dataco2.length ; i++){
			if(new Date(dataco2[i].date).getTime() > min && new Date(dataco2[i].date).getTime() < max) {
				if (i != dataco2.length - 1) {
					let mini = (new Date(dataco2[i + 1].date).getTime() - new Date(dataco2[i].date).getTime()) / (1000 * 60);
					if (mini > 11) {
						let nbskip = mini / 10;
						for (let y = 0; y < nbskip; y++) {
							let date = new Date(dataco2[i].date)
							date.setMinutes(date.getMinutes() + y * 10);

							let value = {
								"PPM": 0,
								"date": date,
								"limit": 800
							}
							data.push(value);

						}
					} else {
						let value = {
							"PPM": dataco2[i].PPM,
							"date": dataco2[i].date,
							limit: 800
						}

						data.push(value);

					}
				} else {
					let value = {
						"PPM": dataco2[i].PPM,
						"date": dataco2[i].date,
						limit: 800
					}

					data.push(value);

				}

			}
		}
		console.log("ici ");
		console.log(data);

	}else if(when === "week"){
		let date = new Date();

		date.setDate(date.getDate() - date.getDay() + (date.getDay() == 0 ? -6:1))
		date.setHours(0);
		date.setMinutes(0);
		date.setSeconds(0);
		let min = date.getTime();

		date.setHours(23);
		date.setMinutes(59);
		date.setSeconds(59);
		date.setDate(date.getDate() +6)

		let max = date.getTime()
		console.log(" avant : " +new Date(min)+ " max : "+new Date(max));

		for(let i = 0; i < dataco2.length ; i++){
			if(new Date(dataco2[i].date).getTime() > min && new Date(dataco2[i].date).getTime() < max) {

				if (i != dataco2.length - 1) {

					let min = (new Date(dataco2[i + 1].date).getTime() - new Date(dataco2[i].date).getTime()) / (1000 * 60);
					if (min > 20) {
						let nbskip = min / 10;
						for (let y = 0; y < nbskip; y++) {
							let date = new Date(dataco2[i].date)
							date.setMinutes(date.getMinutes() + y * 10);

							let value = {
								"PPM": 0,
								"date": date,
								"limit": 800
							}
							data.push(value);

						}
					} else {
						let value = {
							"PPM": dataco2[i].PPM,
							"date": dataco2[i].date,
							limit: 800
						}
						data.push(value);

					}
				} else {
					let value = {
						"PPM": dataco2[i].PPM,
						"date": dataco2[i].date,
						limit: 800
					}
					data.push(value);

				}

			}
		}

	}else if(when === "month") {


		let date = new Date();

		date.setDate(1)
		date.setHours(0);
		date.setMinutes(0);
		date.setSeconds(0);
		let min = date.getTime();
		let lastday = function (y, m) {
			return new Date(y, m + 1, 0).getDate();
		}
		date.setDate(lastday(date.getFullYear(), date.getMonth()))
		date.setHours(23);
		date.setMinutes(59);
		date.setSeconds(59);

		let max = date.getTime()
		console.log(" avant : " + new Date(min) + " max : " + new Date(max));
		let PPM =0;
		let dates = null;
		let limit = 800;
		let y = 0;
		for (let i = 0,w=0; i < dataco2.length; i++) {


			if (new Date(dataco2[i].date).getTime() > min && new Date(dataco2[i].date).getTime() < max) {
				let day = new Date(dataco2[i].date).getDate();
				let daytemp = null
				if(i!=dataco2.length-1) {
					daytemp = new Date(dataco2[i + 1].date).getDate()
				}

				if(day == daytemp){
					PPM= +PPM + +dataco2[i].PPM;
					dates = dataco2[i].date;
					y++;
					console.log(PPM)
				}else{
					PPM= +PPM + +dataco2[i].PPM;
					y++;
					dataDay[w] = {
						PPM: Math.round(PPM /y),
						date: dates,
						limit:limit
					}
					console.log(dataDay[w])
					w++;
					y=0;
					PPM = 0;
					dates = null;
				}
			}
		}
		data.push(dataDay[0]);
		for (let i = 0; i < dataDay.length; i++) {
					if(i != dataDay.length-1) {
						let mini = (new Date(dataDay[i+1].date).getTime() - new Date(dataDay[i].date).getTime()) / (1000 * 60 * 60 * 24);
						if (mini > 1) {
							let nbskip = mini;
							for (let y = 1; y < nbskip; y++) {
								let date = new Date(dataDay[i].date)
								date.setDate(date.getDate() + y);

								let value = {
									"PPM": 0,
									"date": date,
									"limit": 800
								}
								data.push(value);

							}
						} else {
							let value = {
								"PPM": dataDay[i].PPM,
								"date": dataDay[i].date,
								limit: 800
							}
							console.log()
							data.push(value);

						}
					}else{
						let value = {
							"PPM": dataDay[i].PPM,
							"date": dataDay[i].date,
							limit: 800
						}
						data.push(value);
					}
		}
		}


	chart.data = data;
	if(status === true){
		createGraph();
	}
	if(getWhen() == "day") {
		dateAxis.baseInterval = {
			timeUnit: "minute",
			count: 10
		}
	}else if(getWhen() == "week"){
		dateAxis.baseInterval = {
			timeUnit: "day",
			count: 1
		}
	}else if(getWhen() == "month"){
		dateAxis.baseInterval = {
			timeUnit: "day",
			count: 1
		}
	}
	console.log(dataDay)

	console.log(chart.data)
	chart.validateData();
}
function createGraph() {
	if(chart.data.length != 0) {
		status = false;
		chart.dateFormatter.inputDateFormat = "MM-dd-yyyy HH:mm:ss";
		dateAxis.renderer.minGridDistance = 60;
		dateAxis.startLocation = 0.5;
		dateAxis.endLocation = 0.5;
		dateAxis.tooltipDateFormat = "dd-MM-yyyy HH:mm";

		let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
		valueAxis.tooltip.disabled = true;


		/* == COURBE BLEU VALEURS CO2 == */
		let series = chart.series.push(new am4charts.LineSeries());
		series.dataFields.dateX = "date";
		series.name = "CO2 de la pièce en PPM";
		series.dataFields.valueY = "PPM";
		series.tooltipHTML = "<img src='../../../images/CO2.png' style='vertical-align:bottom; margin-right: 10px; width:35px; height:28px;'><span style='font-size:14px; color:#000000;'><b>{valueY.value}</b></span>";
		series.tooltip.background.fill = am4core.color("#FFF");
		series.tooltip.getStrokeFromObject = true;
		series.tooltip.background.strokeWidth = 3;
		series.tooltip.getFillFromObject = false;
		series.fillOpacity = 0.6;
		series.strokeWidth = 2;
//series.fill = am4core.color("green"); // changer la couleur de remplissage
		series.stacked = false; //false sinon les courbes ne peuvent pas se superposer


		/* == LIMITE ROUGE A NE PAS DEPASSER ==*/
		let series2 = chart.series.push(new am4charts.LineSeries());
		series2.name = "Limite à ne pas dépasser";
		series2.dataFields.dateX = "date";
		series2.dataFields.valueY = "limit";
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
	}

}
