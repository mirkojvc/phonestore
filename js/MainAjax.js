(function () {
    /*
    * Kreira ajax poziv i na osnovu prosledjenih
    *  parametara poziva funkciju iz zeljenog fajla
    * @param   {string}    file         Fajl koji ce se pozvati
    * @param   {string}    method       Metoda u fajlu koji ce se pozvati
    */
    function methodRaw(rate_value) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("survey_value").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/updateSurvey?rate_value=" + rate_value, true);
        xmlhttp.send();
    }

    function surveySubmited () {
        var rate_value = 0;
        if (document.getElementById("survey1").checked) {
            rate_value = document.getElementById("survey1").value;
        } else  if (document.getElementById("survey2").checked) {
            rate_value = document.getElementById("survey2").value;
        } else  if (document.getElementById("survey3").checked) {
            rate_value = document.getElementById("survey3").value;
        }
        if (rate_value > 0) {
            methodRaw(rate_value);
        }
    }

    var form = document.getElementById("survey_submt");
    form.addEventListener("click", surveySubmited);
}());
