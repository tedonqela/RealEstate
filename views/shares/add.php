<div id="vertical-form" class="form-horizontal">
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center border-bottom">
      <h1 >Posto shpalljen tuaj</h1>
    </div>
    <div class="col-md-12 plot-shpalljen">
      <p class="text-muted shpallje_steps clearfix">
        <span class="span">2</span> Ploteso informatat e shpalljes .
      </p>
    </div>
  </div>
</div>
</div>
<form enctype="multipart/form-data" class="cmxform" id="form1" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" >
<div class="container">
    <div class="row">
      <div class="col-sm-6 info-right-border">
        <h1 class="main-title">Infromatat rreth shpalljes</h1>
        <div class="form-group">
          <p>
            <label for="titulli">Titulli</label>
            <input id="title" class="form-control" name="title" minlength="2" type="text" required>
          </p>
        </div>
        <div class="form-group">
          <label for="Lloji-shpalljes">Lloji i shpalljes</label>
          <select id="Lloji-shpalljes" name="status" class="form-control">
            <option selected value="1">Shitet</option>
            <option value="2">Blihet</option>
            <option value="3">Qira</option>
          </select>
        </div>
       
        <div class="form-group">
          <label for="Kategoria-shpalljes">Kategoria</label>
          <select id="Kategoria-shpalljes" name="types" class="form-control">
            <option value="1">Ara dhe Ferma</option>
            <option value="2">Banesa</option>
            <option value="3">Dhoma</option>
            <option value="4">Objekt Afarist</option>
            <option value="5">Shtepi/Vila</option>
            <option value="6">Zyre</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="Kuadratura-shpalljes">Kuadratura</label>
          <input type="number" class="form-control" id="Kuadratura-shpalljes" name="surface" required>
        </div>
<!---->
<!--        <div id="nrDhomav" hidden=""  style="display: block;">-->
<!--          <div class="form-group nrDhomave" style="display: block;">-->
<!--            <label for="Dhomat-shpalljes">Numri i dhomave</label>-->
<!--            <input type="number" class="form-control" id="Dhomat-shpalljes" name="badroom" required>-->
<!--          </div>-->
<!--        </div>-->

        

        <div class="form-group">
          <div class="row"> 
            <div class="col-md-9">
              <label for="Qmimi-shpalljes-label">Qmimi</label>
              <input type="number" class="form-control" id="Qmimi-shpalljes-label" name="price" required>
            </div>
            <div class="col-md-3">
              <label >&nbsp;</label>
                <select id="Qmimi-shpalljes-field" name="valuteSel" class="form-control">
                  <option selected>€</option>
                  <option>Lek</option>
                </select>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label for="Pershkrimi-shpalljes">Pershkrimi</label>
          <textarea class="form-control form-control-textarea" id="Pershkrimi-shpalljes" name="description" rows="3" required></textarea>
        </div>


      </div> 
       <div class="col-sm-6">
        <h1 class="main-title">Informatat e kontaktit</h1>
        <div class="form-group">
          <label for="email-shpalljet">Email</label>                   
          <input type="email" class="form-control" id="email-shpalljet" autocomplete="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="Shteti-shpalljes">Shteti</label>
          <select id="Shteti-shpalljes" name="state" class="form-control">
            <option>--Selecte</option>
            <option>KOSOVA</option>
            <option>SHQIPERI</option>
          </select>
        </div>

        <div class="form-group">
          <label for="Rajoni-shpalljes">Rajoni</label>
          <select id="Rajoni-shpalljes" name="city" class="form-control" required>
          </select>
        </div>

        <div class="form-group">
          <label for="tel-shpalles">Telefoni</label>
          <input id="tel-shpalles" type="text" class="form-control" name="tel" required>
        </div> 

      
        

        <!-- <div class="form-group">
          <label class="statusi">Eshte shitur</label>
          <div class="form-check">
                <label class="radio-inline">
                  <input type="radio" name="isSold" value="PO">PO
                </label>
                <label class="radio-inline">
                  <input type="radio" name="isSold" value="JO">JO
                </label>
          </div>
        </div> -->
        
        <div class="form-group">
          <label for="tel-shpalles">&nbsp;</label>
          <input type="file" name="filename[]" id="file-upload" class="inputfile" accept="image/x-png,image/gif,image/jpeg" multiple required/>
        </div>
      </div> 
    </div>
  </div> 
  <input type="submit" name="submit" id="form-submit" class="hidden" value="Posto shpalljen">
</form>
      
<!-- 
        <div class="container">
          <div class="row">
            <div class="col-md-12">             
              <form method="POST" enctype="multipart/form-data" action="<?php echo ROOT_URL; ?>shares/upload">
                <div class="fallback"> 
                  <input name="classnotes[]" type="file"  />
                </div> 
                <div class="dz-message">
                  <span><span class="h1 col-12">
                  <i class="gjbd-picture"></i></span> Ngarkoni deri n&#235; 15 fotografi <span class="note">L&#235;sho fotot k&#235;tu ose kliko n&#235; k&#235;t&#235; hap&#235;sir&#235;</span></span>
                </div>
                <button id="dr-btn-upload" type="button" style="margin-top:40px;" onclick="$('#myDropzone').click();" class="btn">Ngarko foto</button> 
                <input type="submit" name="submit" id="form-submit" class="hidden" value="Posto shpalljen"> 
                
              </form>
            </div>
          </div>
        </div> -->
   

    <div id="form-submit-btn">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center btn-prim">
            <input id="postoBtn"  onclick="$('#form-submit').click();" type="submit" class="btn btn-primary" value="Posto shpalljen">
          </div>
        </div>
      </div>
    </div>


    

   

<script>
      $(document).ready(function() {
        // Initializing arrays with city names.
        var KOSOVA = [{
        display: "Artane",value: "1"},
        {display: "Besiane", value: "2"},
        {display: "Burim",value: "3"},
        {display: "Dardane",value: "4"},
        {display: "Deçan",value: "5"},
        {display: "Dragash",value: "6"},
        {display: "Drenas",value: "7"},
        {display: "Ferizaj",value: "8"},
        {display: "Fushe Kosove",value: "9"},
        {display: "Gjakove",value: "10"},
        {display: "Gjilan",value: "11"},
        {display: "Kastriot",value: "12"},
        {display: "Kaçanik",value: "13"},
        {display: "Kline",value: "14"},
        {display: "Leposaviq",value: "15"},
        {display: "Lipjan",value: "16"},
        {display: "Malisheve",value: "17"},
        {display: "Mitrovice",value: "18"},
        {display: "Peje",value: "19"},
        {display: "Prishtine",value: "20"},
        {display: "Prizren",value: "21"},
        {display: "Rahovec",value: "22"},
        {display: "Skenderaj",value: "23"},
        {display: "Shterpce",value: "24"},
        {display: "Shtime",value: "25"},
        {display: "Therande",value: "26"},
        {display: "Viti",value: "27"},
        {display: "Vushtrri",value: "28"},
        {display: "Zubin Potok",value: "29"},
        {display: "Zveçan",value: "30"},];
        var SHQIPERI = [{
        display: "Malesi e Madhe",value: "31"},
        {display: "Tropoje",value: "32"},
        {display: "Shkoder",value: "33"},
        {display: "Puke",value: "34"},
        {display: "Has",value: "35"},
        {display: "Kukes",value: "36"},
        {display: "Lezhe",value: "37"},
        {display: "Mirdite",value: "38"},
        {display: "Diber",value: "39"},
        {display: "Kurbin",value: "40"},
        {display: "Kruje",value: "41"},
        {display: "Durres",value: "42"},
        {display: "Mat",value: "43"},
        {display: "Bulqize",value: "44"},
        {display: "Tirane",value: "45"},
        {display: "Kavaje",value: "46"},
        {display: "Peqin",value: "47"},
        {display: "Elbasan",value: "48"},
        {display: "Librazhd",value: "49"},
        {display: "Lushnje",value: "50"},
        {display: "Kucove",value: "51"},
        {display: "Gramsh",value: "52"},
        {display: "Pogradec",value: "53"},
        {display: "Fier",value: "54"},
        {display: "Mallakaster",value: "55"},
        {display: "Berat",value: "56"},
        {display: "Skrapar",value: "57"},
        {display: "Korçe",value: "58"},
        {display: "Devoll",value: "59"},
        {display: "Vlore",value: "60"},
        {display: "Tepelene",value: "61"},
        {display: "Permet",value: "62"},
        {display: "Kolonje",value: "63"},
        {display: "Gjirokaster",value: "64"},
        {display: "Delvine",value: "65"},
        {display: "Sarande",value: "66"}];
            // Function executes on change of first select option field.
            $("#Shteti-shpalljes").change(function() {
                var select = $("#Shteti-shpalljes option:selected").val();
                switch (select) {
                    case "KOSOVA":
                      city(KOSOVA);
                    break;
                    case "SHQIPERI":
                      city(SHQIPERI);
                    break;
                    default:
                    $("#Rajoni-shpalljes").empty();
                    break;
                }
            });
        // Function To List out Cities in Second Select tags
        function city(arr) {
                $("#Rajoni-shpalljes").empty(); //To reset cities
                $(arr).each(function(i) { //to list cities
                    $("#Rajoni-shpalljes").append("<option value=\"" + arr[i].value + "\">" + arr[i].display + "</option>")
                });
            }
        });
</script>


 
<!-- 
<script type="text/javascript">
	Dropzone.options.imageUpload = {
        maxFilesize:1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    };
</script> -->
<!-- 
    <script src="<?php echo ROOT_PATH;?>assets/js/dropzone.js"></script> -->
    <script src="<?php echo ROOT_PATH;?>assets/js/script.js"></script>