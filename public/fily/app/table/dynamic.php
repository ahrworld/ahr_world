<script>
$(document).ready(function () {
          // prepare the data
  var theme = 'metro';

   var source = {
       datatype: "json",
       datafields: [{ name: 'id', type: 'string' },
                    { name: 'name', type: 'string' },
                    { name: 'name_s', type: 'string' }],
       id: 'id',
       url: 'data.php',
       root: 'Rows'
   };
   var wdapter = new $.jqx.dataAdapter(source, {
       loadError: function(xhr, status, error) {
           alert(error);
       }
   });
   var getLocalization = function() {
       var localizationobj = {};
       localizationobj.pagergotopagestring = "當前頁數";
       localizationobj.pagershowrowsstring = "顯示筆數";
       localizationobj.pagerrangestring = " 至 ";
       localizationobj.pagernextbuttonstring = "voriger";
       localizationobj.pagerpreviousbuttonstring = "nächster";
       localizationobj.sortascendingstring = "Sortiere aufsteigend";
       localizationobj.sortdescendingstring = "Sortiere absteigend";
       localizationobj.sortremovestring = "Entferne Sortierung";
       localizationobj.firstDay = 1;
       localizationobj.percentsymbol = "%";
       localizationobj.currencysymbol = "€";
       localizationobj.currencysymbolposition = "after";
       localizationobj.decimalseparator = ".";
       localizationobj.thousandsseparator = ",";
       var days = {
           // full day names
           names: ["日", "一", "二", "三", "四", "五", "六"],
           // abbreviated day names
           namesAbbr: ["日", "一", "二", "三", "四", "五", "六"],
           // shortest day names
           namesShort: ["日", "一", "二", "三", "四", "五", "六"]
       };
       localizationobj.days = days;
       var months = {
           // full month names (13 months for lunar calendards -- 13th month should be "" if not lunar)
           names: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月", ""],
           // abbreviated month names
           namesAbbr: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月", ""]
       };
       var patterns = {
           d: "dd.MM.yyyy",
           D: "dddd, d. MMMM yyyy",
           t: "HH:mm",
           T: "HH:mm:ss",
           f: "dddd, d. MMMM yyyy HH:mm",
           F: "dddd, d. MMMM yyyy HH:mm:ss",
           M: "dd MMMM",
           Y: "MMMM yyyy"
       }
       localizationobj.patterns = patterns;
       localizationobj.months = months;
       localizationobj.todaystring = "今天";
       localizationobj.clearstring = "取消";
       return localizationobj;
   }
   var photorenderer = function (row, column, value) {
       var name = $('#jqxgrid').jqxGrid('getrowdata', row).FirstName;
       var imgurl = '../../images/' + name.toLowerCase();
       var img = '<div style="background: white;"><img style="margin:2px; margin-left: 10px;" width="32" height="32" src="' + imgurl + '"></div>';
       return img;
   }

          $("#jqxgrid").jqxGrid(
          {
              width: '100%',
              autorowheight:true,
              autoheight: true,
              source: wdapter,
              showfilterrow: true,
              filterable: true,
              pageable: true,
              autoheight: true,
              editable: true,
              selectionmode: 'checkbox',
              theme: theme,
              localization: getLocalization(),
              altrows: true,
              keyboardnavigation: false,
              //showtoolbar
              toolbarheight: 40,
           columns: [
               { text: 'Number',  datafield: 'id', width: '10%' },
               { text: '写真',   datafield: 'name', width: '17.3%', },
               { text: '名前',   datafield: 'name_s', width: '10%', }
                    ]
          });


  });
</script>
<style>
  #jqxgrid{

  }

</style>
<div class="page page-table">
  <section class="panel panel-default table-dynamic">
    <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span>應收帳款單</strong></div>
    <div>
      <div id="jqxgrid" style="margin-top:10px;"></div>
    </div>
  </section>
</div>

