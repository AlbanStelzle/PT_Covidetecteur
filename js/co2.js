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
let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
let series;
let series2;
let status = true;
let boolseries = false

chart.data = [];
let datatab = [];
let allDate = [];
let when = null
let lastDateChose = null;
const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
	"Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
];

getAllDate()
setInfo()
setDateDropdown()

function setInfo(){
	let valeur = [];
	let radios = document.getElementsByName('btnradio');
	let radios2 = document.getElementsByName('btnradio2');

	for(let i = 0; i < radios.length; i++){
		if(radios[i].checked){
			valeur["what"] = radios[i].value;


		}
	}
	for(let i = 0; i < radios2.length; i++){
		if(radios2[i].checked){
			valeur["when"] = radios2[i].value;

		}
	}
	when = valeur;
	if(lastDateChose != null){
		attributeData(lastDateChose)
	}else{
		attributeData(allDate[allDate.length-1].date)

	}

}
function setDateDropdown(){
	let dropdown = document.getElementById("dropdownDate")
	let buttontext;
	setInfo();

	switch (when["when"]) {

		case "day":
			while (document.getElementById("dropdownDate").firstChild) {
				dropdown.removeChild(dropdown.lastChild);
			}
			for(let i = 0; i< allDate.length; i++){
				buttontext =  "<a class=\"dropdown-item\" href=\"#\" onclick=\"attributeData('"+ allDate[i].date+"')\">"+allDate[i].date.getDate()+"/"+(allDate[i].date.getMonth()+1)+"/"+allDate[i].date.getFullYear()+"</a>"
				dropdown.innerHTML+= (buttontext)

			}
			break;
		case "week":
			let firstdayofweek;
			let lastdayofweek;
			let weektemp = 0;
			while (document.getElementById("dropdownDate").firstChild) {
				dropdown.removeChild(dropdown.lastChild);
			}
			for(let i = 0; i< allDate.length; i++){
				firstdayofweek = new Date(new Date(allDate[i].date).getFullYear(),new Date(allDate[i].date).getMonth(),(new Date(allDate[i].date).getDate() - new Date(allDate[i].date).getUTCDay()))
				lastdayofweek = new Date(firstdayofweek);
				lastdayofweek.setDate(lastdayofweek.getUTCDate()+7)

				if(firstdayofweek.getTime() != weektemp) {
					buttontext = "<a class=\"dropdown-item\" href=\"#\" onclick=\"attributeData('"+ new Date(allDate[i].date)+"')\">Du " + firstdayofweek.getDate() + "/" + (firstdayofweek.getMonth() + 1) + "/" + firstdayofweek.getFullYear() + " au " + lastdayofweek.getDate() + "/" + (lastdayofweek.getMonth() + 1) + "/" + lastdayofweek.getFullYear() +"</a>"
					dropdown.innerHTML += (buttontext)
				}
				weektemp = firstdayofweek.getTime();
			}
			break;
		case "month":
			let month;
			let monthtemp;
			while (document.getElementById("dropdownDate").firstChild) {
				dropdown.removeChild(dropdown.lastChild);
			}
			for(let i = 0; i< allDate.length; i++){
				month = new Date(new Date(allDate[i].date)).getUTCMonth()
				if(i < allDate.length - 1){
					monthtemp = new Date(new Date(allDate[i+1].date)).getUTCMonth()
				}
				if(i == 0){
					buttontext = "<a class=\"dropdown-item\" href=\"#\" onclick=\"attributeData('" + allDate[i].date + "')\">Mois de "+monthNames[new Date(allDate[i].date).getUTCMonth()]+"</a>"
					dropdown.innerHTML += (buttontext)
				}else {
					if (month != monthtemp) {
						buttontext = "<a class=\"dropdown-item\" href=\"#\" onclick=\"attributeData('" + allDate[i].date + "')\">Mois de " + monthNames[new Date(allDate[i].date).getUTCMonth()] + "</a>"
						dropdown.innerHTML += (buttontext)
					}
					monthtemp = month;
				}
			}
			break;
	}
}
function getAllDate(){
	let date;
	let datetemp;
	for (let i = 0,w=0; i < dataco2.length; i++) {
		date = new Date(new Date(dataco2[i].date).getFullYear(),new Date(dataco2[i].date).getMonth(),new Date(dataco2[i].date).getDate());
		if(i!=dataco2.length-1) {
			datetemp = new Date(new Date(dataco2[i+1].date).getFullYear(),new Date(dataco2[i+1].date).getMonth(),new Date(dataco2[i+1].date).getDate());
		}
		if(date.getTime() !== datetemp.getTime()) {
			allDate[w] = {date:date}
			w++;

		}
	}
console.log(allDate)
}


function attributeData(datechose){
	let dataDay =[];
	datatab = [];
	lastDateChose = datechose;

	if(when["when"] === "day"){
		let date = new Date(datechose);
		date.setHours(0);
		date.setMinutes(0);
		date.setSeconds(0);
		let min = date.getTime();

		date.setHours(23);
		date.setMinutes(59);
		date.setSeconds(59);
		let max = date.getTime()

		//console.log(" avant : " +new Date(min)+ " max : "+new Date(max));
		let value = []
		let data = 0;
		for(let i = 0; i < dataco2.length ; i++){
			if(new Date(dataco2[i].date).getTime() > min && new Date(dataco2[i].date).getTime() < max) {
				if (i != dataco2.length - 1) {

					let mini = (new Date(dataco2[i + 1].date).getTime() - new Date(dataco2[i].date).getTime()) / (1000 * 60);
					if (mini > 11 && new Date(dataco2[i+1].date).getTime() < max) {
						let nbskip = mini / 10;

						for (let y = 0; y < nbskip; y++) {
							let date = new Date(dataco2[i].date)
							date.setMinutes(date.getMinutes() + y * 10);

							 value = {
								"data": 0,
								"date": date,
								"limit": 800
							}

							datatab.push(value);

						}
					} else {
						switch (when["what"]) {
							case "CO2": data = dataco2[i].PPM;
								break;
							case "Humidity": data = dataco2[i].humidite;
								break;
							case "Temp": data = dataco2[i].degre;
								break;
						}
						 value = {
							"data": data,
							"date": dataco2[i].date,
							limit: 800
						}

						datatab.push(value);

					}
				} else {
					switch (when["what"]) {
						case "CO2":data = +data + +dataco2[i].PPM;
							break;
						case "Humidity": data = +data + +dataco2[i].humidite;
							break;
						case "Temp": data = +data + +dataco2[i].degre;
							break;
					}
					 value = {
						"data": data,
						"date": dataco2[i].date,
						limit: 800
					}
					datatab.push(value);

				}

			}
		}
		//console.log("date",new Date(datatab[datatab.length-1].date),"max",new Date(max))

		if(new Date(datatab[datatab.length-1].date).getTime() < max){
			let after = (max - new Date(datatab[datatab.length-1].date).getTime() ) / (1000 * 60)
			let date = new Date(datatab[datatab.length - 1].date)

			if(after>11) {
				let nbskip = after / 10;

				let value =[]
				for (let y = 1; y < nbskip; y++) {
					date.setMinutes(date.getMinutes() + 10);
					value = {
						"data": 0,
						"date": new Date(date.getTime()),
						"limit": 800
					}
					datatab.push(value);

				}
			}
		}

	}
	else if(when["when"] === "week"){
		let date = new Date(datechose);

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
		//console.log(" avant : " +new Date(min)+ " max : "+new Date(max));
		let data =0;
		let dates = null;
		let limit = 800;
		let y = 0;
		let boolgetfirst = true;
		let before= null;
		let after= null;
		let nbskip = 0;
		for (let i = 0,w=0; i < dataco2.length; i++) {

			if (new Date(dataco2[i].date).getTime() > min && new Date(dataco2[i].date).getTime() < max) {
				let day = new Date(dataco2[i].date).getDate();
				let daytemp = null
				if(i!=dataco2.length-1) {
					daytemp = new Date(dataco2[i + 1].date).getDate()
				}
				if(day == daytemp){
					switch (when["what"]) {
						case "CO2":data = +data + +dataco2[i].PPM;
						break;
						case "Humidity": data = +data + +dataco2[i].humidite;
						break;
						case "Temp": data = +data + +dataco2[i].degre;
						break;
					}

					dates = dataco2[i].date;
					y++;
				}else{
					switch (when["what"]) {
						case "CO2":data = +data + +dataco2[i].PPM;
							break;
						case "Humidity": data = +data + +dataco2[i].humidite;
							break;
						case "Temp": data = +data + +dataco2[i].degre;
							break;
					}
					y++;
					dataDay[w] = {
						data: Math.round(data /y),
						date: dates,
						limit:limit
					}
					w++;
					y=0;
					data = 0;
					dates = null;
				}
			}
		}
		let value =[]
		let mini = 0;

		for(let i = 0; i < dataDay.length ; i++){

				if (i != dataDay.length - 1) {
					 mini = (new Date(dataDay[i + 1].date).getTime() - new Date(dataDay[i].date).getTime()) / (1000 * 60*60 * 24);
					if(boolgetfirst){
						before =  (new Date(dataDay[i].date).getTime() - min) / (1000 * 60*60 * 24)
						boolgetfirst = false;
					}

					if(before>1){
					nbskip = before

						for (let y = 0; y < nbskip; y++) {
							 date = new Date(dataDay[i].date)
							date.setDate(date.getDate() - y);

							 value = {
								"data": 0,
								"date": date,
								"limit": 800
							}
							datatab.push(value);

						}

					}
					if (mini > 1) {
						 nbskip= mini;
						for (let y = 0; y < nbskip; y++) {
							let date = new Date(dataDay[i].date)
							date.setDate(date.getDate() + y);

							 value = {
								"data": 0,
								"date": date,
								"limit": 800
							}

							datatab.push(value);

						}
					} else {
						 value = {
							"data": dataDay[i].data,
							"date": dataDay[i].date,
							limit: 800
						}


						datatab.push(value);

					}
				} else {
					 value = {
						"data": dataDay[i].data,
						"date": dataDay[i].date,
						limit: 800
					}


					datatab.push(value);

				}

			}
		if(new Date(datatab[datatab.length-1].date).getTime() < max){
			after = (max - new Date(datatab[datatab.length-1].date).getTime() ) / (1000 * 60*60 * 24)
			let date = new Date(datatab[datatab.length - 1].date)

			if(after>1) {
				let value =[]
				for (let y = 1; y < after; y++) {
					date.setDate(date.getDate() + 1);
					value = {
						"data": 0,
						"date": new Date(date.getTime()),
						"limit": 800
					}
					datatab.push(value);

				}
			}
		}



	}
	else if(when["when"] === "month") {


		let date = new Date(datechose);

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
		//console.log(" avant : " + new Date(min) + " max : " + new Date(max));
		let data =0;
		let dates = null;
		let limit = 800;
		let y = 0;
		let boolgetfirst = true
		let before = 0
		let after = 0
		for (let i = 0,w=0; i < dataco2.length; i++) {


			if (new Date(dataco2[i].date).getTime() > min && new Date(dataco2[i].date).getTime() < max) {
				let day = new Date(dataco2[i].date).getDate();
				let daytemp = null
				if(i!=dataco2.length-1) {
					daytemp = new Date(dataco2[i + 1].date).getDate()
				}

				if(day == daytemp){
					if(when["what"])
						switch (when["what"]) {
							case "CO2":data = +data + +dataco2[i].PPM;
							break;
							case "Humidity": data = +data + +dataco2[i].humidite;
							break;
							case "Temp": data = +data + +dataco2[i].degre;
							break;
						}
					dates = dataco2[i].date;
					y++;
				}else{
					switch (when["what"]) {
						case "CO2":data = +data + +dataco2[i].PPM;
						break;
						case "Humidity": data = +data + +dataco2[i].humidite;
						break;
						case "Temp": data = +data + +dataco2[i].degre;
						break;
					}
					y++;
					dataDay[w] = {
						data: Math.round(data /y),
						date: dates,
						limit:limit
					}
					w++;
					y=0;
					data = 0;
					dates = null;
				}
			}
		}
		for (let i = 0; i < dataDay.length; i++) {
					if(i != dataDay.length-1) {
						if(boolgetfirst){
							before =  (new Date(dataDay[i].date).getTime() - min) / (1000 * 60*60 * 24)
							boolgetfirst = false;
						}
						if(before>1){
							nbskip = before

							for (let y = 0; y < nbskip-1; y++) {
								let date = new Date(min)
								date.setDate(date.getDate() + y);

								let value = {
									"data": 0,
									"date": date,
									"limit": 800
								}
								datatab.push(value);
							}
							before = 0;
							datatab.push(dataDay[0]);


						}
						let mini = (new Date(dataDay[i+1].date).getTime() - new Date(dataDay[i].date).getTime()) / (1000 * 60 * 60 * 24);
						if (mini > 1) {
							let nbskip = mini;
							for (let y = 1; y < nbskip; y++) {
								let date = new Date(dataDay[i].date)
								date.setDate(date.getDate() + y);

								let value = {
									"data": 0,
									"date": date,
									"limit": 800
								}
								datatab.push(value);

							}
						} else {
							let value = {
								"data": dataDay[i].data,
								"date": dataDay[i].date,
								limit: 800
							}
							datatab.push(value);

						}
					}else{
						let value = {
							"data": dataDay[i].data,
							"date": dataDay[i].date,
							limit: 800
						}
						datatab.push(value);
					}
		}

		if(new Date(datatab[datatab.length-1].date).getTime() < max){
			after = (max - new Date(datatab[datatab.length-1].date).getTime() ) / (1000 * 60*60 * 24)
			let date = new Date(datatab[datatab.length - 1].date)

			if(after>1) {
				let value =[]
				for (let y = 1; y < after; y++) {
					date.setDate(date.getDate() + 1);
					 value = {
						"data": 0,
						"date": new Date(date.getTime()),
						"limit": 800
					}
					datatab.push(value);

				}
			}
		}
		}
	chart.data = datatab;
	console.log(chart.data)
	if(status === true){
		createGraph();
	}
	switch (when["when"]) {
		case "day":
			dateAxis.baseInterval = {
			timeUnit: "minute",
			count: 10
		};
			dateAxis.title.text= +new Date(chart.data[0].date).getDate() +" " + monthNames[new Date(chart.data[0].date).getUTCMonth()] +" "+ new Date(chart.data[0].date).getFullYear()
			break;
		case "week":
			dateAxis.baseInterval = {
			timeUnit: "day",
			count: 1
		};
			dateAxis.title.text= "Du "+new Date(chart.data[0].date).getDate() +" " + monthNames[new Date(chart.data[0].date).getUTCMonth()] + " au " + new Date(chart.data[chart.data.length-1].date).getDate() +" " + monthNames[new Date(chart.data[chart.data.length-1].date).getUTCMonth()] + " "+new Date(chart.data[chart.data.length-1].date).getFullYear()

			break;
		case "month":
			dateAxis.baseInterval = {
			timeUnit: "day",
			count: 1
		};
			dateAxis.title.text= "Du "+new Date(chart.data[0].date).getDate() +" " + monthNames[new Date(chart.data[0].date).getMonth()] + " au " + new Date(chart.data[chart.data.length-1].date).getDate() +" " + monthNames[new Date(chart.data[chart.data.length-1].date).getMonth()] + " "+new Date(chart.data[chart.data.length-1].date).getFullYear()

			break;
	}
	switch (when["what"]) {
		case "CO2":
			series.name = "CO2 de la pièce en PPM";
			valueAxis.title.text = "Partie par million (PPM)";
			if(boolseries){
				series2.show()
				boolseries = false
			}
			break;
		case "Humidity":
			series.name = "Humidité de la pièce en %";
			valueAxis.title.text = "Humidité (%)";

			series2.hidden = true;
			boolseries = true
			break;
		case "Temp":
			series.name = "Température de la pièce en °C";
			valueAxis.title.text = "Degré (°C)";

			series2.hidden = true;
			boolseries = true;
			break;
	}
	//console.log("chart.dada",chart.data)
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

		valueAxis.title.text = "Partie par million (PPM)";


		/* == COURBE BLEU VALEURS CO2 == */
		series = chart.series.push(new am4charts.LineSeries());
		series.dataFields.dateX = "date";
		series.name = "CO2 de la pièce en PPM";
		series.dataFields.valueY = "data";
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
		series2 = new am4charts.LineSeries();
		chart.series.push(series2)
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
