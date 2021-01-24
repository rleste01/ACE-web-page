<?php define( 'WP_DEBUG', true );
      define( 'WP_DEBUG', false );
?>

<?php /*Template Name: CustomPageT1 */
get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php /* Add comments */  thinkup_input_allowcomments(); ?>

        <?php echo 
'<html>
  <head>
    <title>Google Sheets API Quickstart</title>
    <meta charset="utf-8" />
  </head>
  <body>

    <script type="text/javascript">
      // Client ID and API key from the Developer Console
      var CLIENT_ID = "";
      var API_KEY = "";

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://sheets.googleapis.com/$discovery/rest?version=v4"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/spreadsheets.readonly";

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        gapi.load("client", initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          getData();
        }, function(error) {
          appendPre(JSON.stringify(error, null, 2));
        });
      }

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById("content");
        var textContent = document.createTextNode(message + "\n");
        pre.appendChild(textContent);
      }


      /**
       * Print the names and majors of students in a sample spreadsheet:
       * 
       */
      function getData() {
        gapi.client.sheets.spreadsheets.values.get({
        spreadsheetId:
        "",
          range: "Sheet1!1:10000",
        }).then(function(response) {
          var range = response.result;
          if (range.values.length > 0) {
            //appendPre("Average Number of Issues someone can engage with: ");
            var threshLabels = [];
            var threshNumApps = [];
            var threshPairs = []
            var primLabels = [];
            var primNumApps = [];
            var primPairs = [];
            var secLabels = [];
            var secNumApps = [];
            var secPairs = [];
            var learnPairs = [];
            var numIssArr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            for (i = 6; i < 56; i++) {
              var count = 0;
              for (j = 0; j < range.values.length; j++) {
                if (range.values[j][i] == "Threshold Issue") {
                  count = count + 1;
                }
              }
              var row0 = range.values[0];
              var threshPair = {label: row0[i], numApps: count}
              threshPairs.push(threshPair);
            }
            threshPairs.sort((a, b) => (a.numApps > b.numApps) ? -1 : 1);
            for (i = 0; i < threshPairs.length; i++){
              threshLabels[i] = changeName(threshPairs[i].label);
              threshNumApps[i] = threshPairs[i].numApps;
            }
            // console.log(threshLabels.slice(0,10));
            // console.log(threshNumApps.slice(0,10));

            for (i = 106; i < 156; i++) {
              var count = 0;
              for (j = 0; j < range.values.length; j++) {
                if(range.values[j][i] == "I can engage with this issue at the moment") {
                  count = count + 1;
                }
              }
              var row0 = range.values[0];
              var primPair = {label: row0[i], numApps: count};
              primPairs.push(primPair);
            }
            primPairs.sort((a, b) => (a.numApps > b.numApps) ? -1 : 1);
            for (i = 0; i < primPairs.length; i++){
              primLabels[i] = changeName(primPairs[i].label);
              primNumApps[i] = primPairs[i].numApps;
            }
            // console.log(primLabels.slice(0,10));
            // console.log(primNumApps.slice(0,10));

            for (i = 106; i < 156; i++) {
              var count = 0;
              for (j = 0; j < range.values.length; j++) {
                if(range.values[j][i] == "I cannot engage with this issue at the moment") {
                  count = count + 1;
                }
              }
              var row0 = range.values[0];
              var secPair = {label: row0[i], numApps: count};
              secPairs.push(secPair);
            }
            secPairs.sort((a, b) => (a.numApps > b.numApps) ? -1 : 1);
            for (i = 0; i < secPairs.length; i++){
              secLabels[i] = changeName(secPairs[i].label);
              secNumApps[i] = secPairs[i].numApps;
            }
            // console.log(secLabels.slice(0,10));
            // console.log(secNumApps.slice(0,10));

            for (i = 0; i < range.values.length; i++){
              if (parseInt(range.values[i][5]) == 0){
                numIssArr[0] = numIssArr[0] + 1;
              }
              if (parseInt(range.values[i][5]) == 1){
                numIssArr[1] = numIssArr[1] + 1;
              }
              if (parseInt(range.values[i][5]) == 2){
                numIssArr[2] = numIssArr[2] + 1;
              }
              if (parseInt(range.values[i][5]) == 3){
                numIssArr[3] = numIssArr[3] + 1;
              }
              if (parseInt(range.values[i][5]) == 4){
                numIssArr[4] = numIssArr[4] + 1;
              }
              if (parseInt(range.values[i][5]) == 5){
                numIssArr[5] = numIssArr[5] + 1;
              }
              if (parseInt(range.values[i][5]) == 6){
                numIssArr[6] = numIssArr[6] + 1;
              }
              if (parseInt(range.values[i][5]) == 7){
                numIssArr[7] = numIssArr[7] + 1;
              }
              if (parseInt(range.values[i][5]) == 8){
                numIssArr[8] = numIssArr[8] + 1;
              }
              if (parseInt(range.values[i][5]) == 9){
                numIssArr[9] = numIssArr[9] + 1;
              }
              if (parseInt(range.values[i][5]) == 10){
                numIssArr[10] = numIssArr[10] + 1;
              }
            }
            // console.log(numIssArr);

            for (i = 56; i < 106; i++) {
              var count = 0;
              for (j = 0; j < range.values.length; j++) {
                if(range.values[j][i] == "Need to Learn More") {
                  count = count + 1;
                }
              }
              var row0 = range.values[0];
              var learnPair = {label: row0[i], numApps: count};
              learnPairs.push(learnPair);
            }

            var fullChartArr = [];
            for (i = 0; i < threshPairs.length; i++) {
              var fullChartObj = {id: changeName(threshPairs[i].label), threshVal: threshPairs[i].numApps, primVal: "", secVal:"", learnVal: ""};
              fullChartArr.push(fullChartObj);
            }
            for (i = 0; i < fullChartArr.length; i++) {
              for (j = 0; j < primPairs.length; j++) {
                if (changeName(primPairs[j].label) == fullChartArr[i].id) {
                  fullChartArr[i].primVal = primPairs[j].numApps;
                }
                if (changeName(secPairs[j].label) == fullChartArr[i].id) {
                  fullChartArr[i].secVal = secPairs[j].numApps;
                }
                if (changeName(learnPairs[j].label) == fullChartArr[i].id){
                  fullChartArr[i].learnVal = learnPairs[j].numApps;
                }
              }
            }
            var labels = [];
            var threshVals = [];
            var primVals = [];
            var secVals = [];
            var learnVals = [];
            for (i = 0; i < fullChartArr.length; i++){
              labels[i] = fullChartArr[i].id;
              threshVals[i] = fullChartArr[i].threshVal;
              primVals[i] = fullChartArr[i].primVal;
              secVals[i] = fullChartArr[i].secVal;
              learnVals[i] = fullChartArr[i].learnVal;
            }
            console.log(fullChartArr);
            createThreshChart(threshLabels.slice(0,10), threshNumApps.slice(0,10));
            createPrimChart(primLabels.slice(0,10), primNumApps.slice(0,10));
            createSecChart(secLabels.slice(0,10), secNumApps.slice(0,10));
            createNumIssueChart(numIssArr);
            createFullChart(labels, threshVals, primVals, secVals, learnVals);
          } 
          else {
            appendPre("No data found.");
          }
        }, function(response) {
          appendPre("Error: " + response.result.error.message);
        });
      }

function changeName(val) {
  if (val === "GovProgPercent" || val === "GovProgEn" || val === "GovProgEngage" || val === "GovProgImp" || val === "GovProgRanksec") {
    val = "Government Programs";
  }
  else if (val === "ForeignPolPercent" || val === "ForeignPolEn" || val === "ForeignPolEngage" || val === "ForeignPolImp" || val === "ForeignPolRanksec") {
    val = "Foreign Policy";
  }
  else if (val === "CJRPercent" || val === "CJREn" || val === "CJREngage" || val === "CJRImp" || val === "CJRRanksec") {
    val = "Criminal Justice Reform";
  }
  else if (val === "NatHealthPercent" || val === "NatHealthEn" || val === "NatHealthEngage" || val === "NatHealthImp" || val === "NatHealthRanksec") {
    val = "National Healthcare";
  }
  else if (val === "CampFinPercent" ||  val ===  "CampFinEn" || val ===  "CampFinEngage" || val === "CampFinRanksec" || val === "CampFinImp") {
    val = "Campaign Finance";
  }
  else if (val === "GunControlPercent" || val ===  "GunControlEn" || val ===  "GunControlEngage" || val === "GunControlRanksec" || val === "GunControlImp") {
    val = "Gun Safety";
  }
  else if (val === "NukesPercent" || val === "NukesEn" || val === "NukesEngage" || val === "NukesRanksec" || val === "NukesImp") {
    val = "Nuclear Proliferation";
  }
  else if (val === "ClimChPercent" || val === "ClimChEn" || val === "ClimChEngage" || val === "ClimChRanksec" || val === "ClimChImp") {
    val = "Climate Change";
    }
  else if (val === "EnviRegPercent" || val === "EnviRegEn" || val === "EnviRegEngage" || val === "EnviRegRanksec" || val === "EnviRegImp") {
    val = "Environmental Regulations";
  }
  else if (val === "NatParksPercent" || val === "NatParksEn" || val === "NatParksEngage" || val === "NatParksRanksec" || val === "NatParksImp") {
    val = "National Parks";
  }
  else if (val === "MedicarePercent" || val === "MedicareEn" || val === "MedicareEngage" || val === "MedicareRanksec" || val === "MedicareImp") {
    val = "Medicare";
  }
  else if (val === "MedicaidPercent" || val === "MedicaidEn" || val === "MedicaidEngage" || val === "MedicaidRanksec" || val === "MedicaidImp") {
    val = "Medicaid";
  }
  else if (val === "HealthcarePercent" || val === "HealthcareEn" || val === "HealthcareEngage" || val === "HealthcareRanksec" || val === "HealthcareImp") {
    val = "Healthcare";
  }
  else if (val === "OpioidsPercent" || val === "OpioidsEn" || val === "OpioidsEngage" || val === "OpioidsRanksec" || val === "OpioidsImp") {
    val = "Opioids";
  }
  else if (val === "EducationPercent" || val === "EducationEn" || val === "EducationEngage" || val === "EducationRanksec" || val === "EducationImp") {
    val = "Education";
  }
  else if (val === "HumanRightsPercent" || val === "HumanRightsEn" || val === "HumanRightsEngage" || val === "HumanRightsRanksec" || val === "HumanRightsImp") {
    val = "Human Rights/Equality";
  }
  else if (val === "SpeechPercent" || val === "SpeechEn" || val === "SpeechEngage" || val === "SpeechRanksec" || val === "SpeechImp") {
    val = "Freedom of Speech";
  }
  else if (val === "PrePercent" || val === "PreEn" || val === "PreEngage" || val === "PreRanksec" || val === "PreImp") {
    val = "Pre-K Education";
  }
  else if (val === "K12Percent" || val === "K12En" || val === "K12Engage" || val === "K12Ranksec" || val === "K12Imp") {
    val = "K-12 Education";
  }
  else if (val === "HigherEdPercent" || val === "HigherEdEn" || val === "HigherEdEngage" || val === "HigherEdRanksec" || val === "HigherEdImp") {
    val = "Higher Education";
  }
  else if (val === "SocSecPercent" || val === "SocSecEn" || val === "SocSecEngage" || val === "SocSecRanksec" || val === "SocSecImp") {
    val = "Social Security";
  }
  else if (val === "StatehoodPercent" || val === "StatehoodEn" || val === "StatehoodEngage" || val === "StatehoodRanksec" || val === "StatehoodImp") {
    val = "Statehood Issues";
  }
  else if (val === "ElectCollPercent" || val === "ElectCollEn" || val === "ElectCollEngage" || val === "ElectCollRanksec" || val === "ElectCollImp") {
    val = "Electoral College";
  }
  else if (val === "GerryPercent" || val === "GerryEn" || val === "GerryEngage" || val === "GerryRanksec" || val === "GerryImp") {
    val = "Gerrymandering";
  }
  else if (val === "EnvironmentPercent" || val === "EnvironmentEn" || val === "EnvironmentEngage" || val === "EnvironmentRanksec" || val === "EnvironmentImp") {
    val = "Environmental Issues";
  }
  else if (val === "OilPercent" || val === "OilEn" || val === "OilEngage" || val === "OilRanksec" || val === "OilImp") {
    val = "Oil and Gas Production in the United States";
  }
  else if (val === "DemRefPercent" || val === "DemRefEn" || val === "DemRefEngage" || val === "DemRefRanksec" || val === "DemRefImp") {
    val = "Democratic Reforms";
  }
  else if (val === "AbortionPercent" || val === "AbortionEn" || val === "AbortionEngage" || val === "AbortionRanksec" || val === "AbortionImp") {
    val = "Abortion";
  }
  else if (val === "LGBTQPercent" || val === "LGBTQEn" || val === "LGBTQEngage" || val === "LGBTQRanksec" || val === "LGBTQImp") {
    val = "LGBTQ Equality";
  }
  else if (val === "RacialPercent" || val === "RacialEn" || val === "RacialEngage" || val === "RacialRanksec" || val === "RacialImp") {
    val = "Racial Equality";
  }
  else if (val === "GenderPercent" || val === "GenderEn" || val === "GenderEngage" || val === "GenderRanksec" || val === "GenderImp") {
    val = "Gender Equality";
  }
  else if (val === "ImmigrationPercent" || val === "ImmigrationEn" || val === "ImmigrationEngage" || val === "ImmigrationRanksec" || val === "ImmigrationImp") {
    val = "Immigration";
  }
  else if (val === "UndocPercent" || val === "UndocEn" || val === "UndocEngage" || val === "UndocRanksec" || val === "UndocImp") {
    val = "Undocumented Immigration";
  }
  else if (val === "DocPercent" || val === "DocEn" || val === "DocEngage" || val === "DocRanksec" || val === "DocImp") {
    val = "Documented Immigration";
  }
  else if (val === "RefugeePercent" || val === "RefugeeEn" || val === "RefugeeEngage" || val === "RefugeeRanksec" || val === "RefugeeImp") {
    val = "Refugee and Asylum Policy";
  }
  else if (val === "MEStratPercent" || val === "MEStratEn" || val === "MEStratEngage" || val === "MEStratRanksec" || val === "MEStratImp") {
    val = "Middle East Strategy";
  }
  else if (val === "RelWChinaPercent" || val === "RelWChinaEn" || val === "RelWChinaEngage" || val === "RelWChinaRanksec" || val === "RelWChinaImp") {
    val = "Relationship with China";
  }
  else if (val === "RelwAllPercent" || val === "RelwAllEn" || val === "RelwAllEngage" || val === "RelwAllRanksec" || val === "RelwAllImp") {
    val = "Relationship with Other American Allies";
  }
  else if (val === "FarmSubPercent" || val === "FarmSubEn" || val === "FarmSubEngage" || val === "FarmSubRanksec" || val === "FarmSubImp") {
    val = "Farm Subsidies";
  }
  else if (val === "ForeignAidPercent" || val === "ForeignAidEn" || val === "ForeignAidEngage" || val === "ForeignAidRanksec" || val === "ForeignAidImp") {
    val = "Foreign Aid and International Programs";
  }
  else if (val === "SciTechPercent" || val === "SciTechEn" || val === "SciTechEngage" || val === "SciTechRanksec" || val === "SciTechImp") {
    val = "Research for Sci/Tech Advancements";
  }
  else if (val === "NatInfPercent" || val === "NatInfEn" || val === "NatInfEngage" || val === "NatInfRanksec" || val === "NatInfImp") {
    val = "National Infrastructure";
  }
  else if (val === "OtherPercent" || val === "OtherEn" || val === "OtherEngage" || val === "OtherRanksec" || val === "OtherImp") {
    val = "Other Issues";
  }
  else if (val === "TaxesPercent" || val === "TaxesEn" || val === "TaxesEngage" || val === "TaxesRanksec" || val === "TaxesImp") {
    val = "Taxes";
  }
  else if (val === "IncTaxPercent" || val === "IncTaxEn" || val === "IncTaxEngage" || val === "IncTaxRanksec" || val === "IncTaxImp") {
    val = "Income Tax";
  }
  else if (val === "CapGainsTaxPercent" || val === "CapGainsTaxEn" || val === "CapGainsTaxEngage" || val === "CapGainsTaxRanksec" || val === "CapGainsTaxImp") {
    val = "Capital Gains Tax";
  }
  else if (val === "CorpTaxPercent" || val === "CorpTaxEn" || val === "CorpTaxEngage" || val === "CorpTaxRanksec" || val === "CorpTaxImp") {
    val = "Corporate Tax";
  }
  else if (val === "MinWagePercent" || val === "MinWageEn" || val === "MinWageEngage" || val === "MinWageRanksec" || val === "MinWageImp") {
      val = "Minimum Wage";
  }
  else if (val === "NatDebtPercent" || val === "NatDebtEn" || val === "NatDebtEngage" || val === "NatDebtRanksec" || val === "NatDebtImp") {
      val = "National Debt";
  }
  else if (val === "HousPolPercent" || val === "HousPolEn" || val === "HousPolEngage" || val === "HousPolRanksec" || val === "HousPolImp") {
      val = "Housing Policy";
  }
  return val;
}
    </script>

<text style="text-align:center">
<h2> The following data reflects the results of ACE’s Political Priorities Worksheet. Complete the
<a href="https://www.surveymonkey.com/r/M2KNRKV"> Political Priorities Worksheet</a> today and see how your results compare to general population’s.</h2>
</text>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    
<div1 style="width:50%;float:left">
    <h2 style="text-align:center">Top 10 Threshold Issues</h2>
    <p style="text-align:center"> Threshold Issues are your deal breaker issues. Although they do not necessarily take center stage in terms of where you want to see progress, you would find it very difficult to support a candidate or organization with a different perspective than you on these issues.</p>
    <canvas id="threshChart" style="width:50%;height:140px"></canvas>


<script>
function createThreshChart(threshLabels, threshNumApps){
  var ctx = document.getElementById("threshChart").getContext("2d");
  //console.log(threshLabels)
  var myChart = new Chart(ctx, {
     type: "bar",
     data: {
          labels: threshLabels,
          datasets: [{
              label: "Number of Times Selected",
              data: threshNumApps,
              backgroundColor: [
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(255, 99, 132, 0.2)"
              ],
              borderColor: [
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
                  "rgba(255, 99, 132, 1)",
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
}
</script>
</div1>

<div1 style="width:50%;float:right">
    <h2 style="text-align:center"> Top 10 Primary Issues</h2>
    <p style="text-align:center"> Primary Issues are the issues which you listed as requiring the most political energy. These issues are the ones which you should try to engage with the most, by volunteering for or donating to campaigns and organizations which focus on progress on these issues. </p>
    <canvas id="primChart" style="width:50%;height:140px"></canvas>


<script>
function createPrimChart(primLabels, primNumApps) {
  var ctx = document.getElementById("primChart").getContext("2d");
  var myChart = new Chart(ctx, {
      type: "bar",
      data: {
          labels: primLabels,
          datasets: [{
              label: "Number of Times Selected",
              data: primNumApps,
              backgroundColor: [
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(54, 162, 235, 0.2)"
              ],
              borderColor: [
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(54, 162, 235, 1)"
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
}
</script>
</div1>

<div1 style="width:50%;float:left">
    <h2 style="text-align:center"> Top 10 Secondary Issues</h2>
    <p style="text-align:center"> Secondary Issues are the issues which are important to you, but fall lower on the list than Primary Issues. It would be helpful for a candidate or organization you are interested in to have the same perspective as you on these issues, but these are not where you should focus your limited time, energy, and attention.</p>
    <canvas id="secChart" style="width:48%;height:140px"></canvas>

<script>
function createSecChart(secLabels, secNumApps) {
  var ctx = document.getElementById("secChart").getContext("2d");
  var myChart = new Chart(ctx, {
      type: "bar",
      data: {
          labels: secLabels,
          datasets: [{
              label: "Number of Times Selected",
              data: secNumApps,
              backgroundColor: [
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(255, 206, 86, 0.2)"
              ],
              borderColor: [
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(255, 206, 86, 1)"
              ],
              borderWidth: 1
          }] 
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
}
</script>
</div1>

<div1 style="width:48%;float:right">
    <h2 style="text-align:center"> Number of Issues People can Engage With </h2>
    <p style="text-align:center"> This is the number of issues that people self-proclaim that they can engage with at the moment with their limited time and energy. </p>
    <canvas id="numChart" style="width:50%;height:140px;"></canvas>


<script>
function createNumIssueChart (numIssArr){
  var ctx = document.getElementById("numChart").getContext("2d");
  var myChart = new Chart(ctx, {
      type: "bar",
      data: {
          labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
          datasets: [{
              label: "Number of Times Selected",
              data: numIssArr,
              backgroundColor: [
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(75, 192, 192, 0.2)"
              ],
              borderColor: [
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(75, 192, 192, 1)"
              ],
              borderWidth: 1
          }]  
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
}
</script>
</div1>

    <h1 style="text-align:center"> All Issues </h1>
    <canvas id="fullChart" height="400"></canvas>


<script>
function createFullChart(labels, threshVals, primVals, secVals, learnVals) {
  var ctx = document.getElementById("fullChart").getContext("2d");
  var myChart = new Chart(ctx, {
      type: "horizontalBar",
      data: {
        labels: labels,
        datasets: [
          {
            label: "Threshold",
            backgroundColor: "rgba(255, 99, 132, 1)",
            data: threshVals
          }, {
            label: "Primary",
            backgroundColor: "rgba(54, 162, 235, 1)",
            data: primVals
          }, {
            label: "Secondary",
            backgroundColor: "rgba(255, 206, 86, 1)",
            data: secVals
          }, {
            label: "Learn More",
            backgroundColor: "rgba(75, 192, 192, 1)",
            data: learnVals
          }
        ]
      },
      /*options: {
        title: {
          display: true,
          text: "Population growth (millions)"
        }
      }*/
  });
}
</script>

<script async defer src="https://apis.google.com/js/api.js"
        onload="this.onload=function(){};handleClientLoad()"
        onreadystatechange="if (this.readyState === "complete") this.onload()">
</script>

</body>
</html>'
;?>


			<?php endwhile; wp_reset_postdata(); ?>

<?php get_footer(); ?>
