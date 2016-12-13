<script>
	   $(document).ready(function () {
	        // prepare the data
	var theme = 'metro';

	 var source =
	        {
	            datatype: "json",
	             datafields: [

	                 { name:'id', type: 'string'},
	                 { name:'name', type: 'string'},
	                 { name:'country', type: 'string'},
	                 { name:'email', type: 'string'},
	                 { name:'sns_status', type: 'string'},
	                 { name:'sns_id', type: 'string'},
	                 { name:'phone', type: 'number'},
	                 { name:'passport_name', type: 'string'},
	                 { name:'passport_number', type: 'string'},
	                 { name:'guest_man', type: 'string'},
	                 { name:'travel_place', type: 'string'},
	                 { name:'guest_kids', type: 'string'},
	                 { name:'address', type: 'string'},
	                 { name:'order_number', type: 'string'},
	                 { name:'gotime', type: 'date'},
	                 { name:'created_at', type: 'date'},
	                 { name:'status', type: 'string'},
	            ],
	          id: 'id',
	          url: '/backend',
	          root: 'Rows'
	      };
	        var wdapter = new $.jqx.dataAdapter(source, {
	            loadError: function (xhr, status, error) {
	                alert('error');
	            }
	        }
	        );
	         var initrowdetails = function (index, parentElement, gridElement, datarecord) {
                var tabsdiv = null;
                var tab1 = null;
                tabsdiv = $($(parentElement).children()[0]);
                if (tabsdiv != null) {
                tab1 = tabsdiv.find('.tab1');
                var container = $('<div style="margin: 5px;"></div>')
                container.appendTo($(tab1));
        //第一面版
        		$.each( datarecord, function( key, value ) {
        		  console.log(JSON.stringify(value));
        		});

                    var description =
                    "<div style='float:left; width:40%; white-space: normal; margin: 10px; font-size:14px;'>"
                    +
                    "<p>護照名字："+ datarecord.passport_name +" </p>"+
                    "<p>護照號碼："+ datarecord.passport_number +" </p>"+
                    "<p>通訊帳號："+ datarecord.sns_id +" </p>"+
					"<p>旅遊地點："+ datarecord.travel_place +" </p>"
                    +
                    "</div>"+
                    "<div style='float:left; white-space: normal; margin: 10px; font-size:14px;'>"
                    +
                    "<p>大人："+ datarecord.guest_man +" </p>"+
                    "<p>小孩："+ datarecord.guest_kids +" </p>"+

                    "<p>民宿/飯店地址："+ datarecord.address +" </p>"
                    +
                    "</div>";

                    $(tab1).append(description);
                    $(tabsdiv).jqxTabs({ width: 700, height:170, theme: theme});
                }
            }
	                            var getLocalization = function () {
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
	            selectionmode: 'checkbox',
	            theme: theme,
	            localization: getLocalization(),
	            altrows: true,
	            keyboardnavigation: false,
                //jqxtab
                rowdetails: true,
                rowdetailstemplate: { rowdetails: "<div style='margin: 10px;'><ul style='margin-left: 30px;'><li>詳細資料</li></ul><div class='tab1'></div></div>", rowdetailsheight:200 },
                initrowdetails: initrowdetails,
                 //showtoolbar
                toolbarheight: 40,
                showtoolbar: true,
	            rendertoolbar: function (element) {
	                var container = $("<div style='margin:0px;'></div>");
	                element.append(container);
	                container.append('<button  type="button" style=" min-width: 80px; margin: 3px -1px 2px;" class="btn btn-primary pay_ok"><i class="fa fa-check" aria-hidden="true" style="margin-right:20px;"></i>已收款</button><button style=" min-width: 80px; margin: 3px -1px 2px;" type="button" id="excelExport" class="btn btn-default"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp;EXCEL</button>');

	                //取消選擇
	                $(".unselect").on('click', function () {
	                    $('#jqxgrid').jqxGrid('clearselection');
	                });
        			$("#pdfExport").click(function () {
                        $("#jqxgrid").jqxGrid('exportdata', 'pdf', 'jqxGrid', true, null, true, 'http://localhost:8000/save-file.php');
                    });
                    $("#excelExport").click(function () {
                        $("#jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid', true, null, true, 'http://localhost:8000/save-file.php');
                    });
	                //OK
	                $(".pay_ok").click(function () {
	                	 var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
	                	 var row = $("#jqxgrid").jqxGrid('getrowdata', selectedrowindex);
	                	 alert(row.id);
	                	 $.ajax({
	                	         dataType: 'json',
	                	         url: 'backends',
	                	         type: 'GET',
	                	         data: 'id='+row.id,
	                	         cache: false,
	                	         async: false,

	                	     });
	                	 $('#jqxgrid').jqxGrid('updatebounddata');
	                });
	            },
	         columns: [
		         { text: '收款狀態',  datafield: 'status',filtertype: 'checkedlist', width: '80px',cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
				                if (value == '已收款') {
				                    return '<span style="margin:5px; margin-left: 22px;" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></span>';
				                }
				                else {
				                    return '<span style="margin:5px; margin-left: 22px;" class="btn btn-warning btn-sm"><i style="font-size: 15px;" class="fa fa-times" aria-hidden="true"></i></span>';
				                }
				            }
	             },
	             { text: '單號',  datafield: 'order_number', width: '10%'},
	             { text: '客戶名稱',   datafield: 'name', width: '15%', },
	             { text: '國籍',   datafield: 'country', width: '15%', },
	             { text: '電子信箱',   datafield: 'email', width: '15%', },
	             { text: '連絡電話',   datafield: 'phone', width: '13%', },
	             { text: '出發時間', datafield: 'gotime', cellsformat: 'yyyy-MM-dd', filtertype: 'date', width: '10%' },
	             { text: '單據成立時間', datafield: 'created_at', cellsformat: 'yyyy-MM-dd', filtertype: 'date', width: '10%' },
	                  ]
	        });


  });

</script>
<style>
	#jqxgrid{

	}
	.jqx-clear{
		z-index: 0;
	}
	#ordersGrid{
		width: 100%;
		height: 30%;
	}
</style>
<div class="page page-table">
  <section class="panel panel-default table-dynamic">

  	<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span>應收帳款單</strong></div>

		<div>
			<div id="jqxgrid" style="margin-top:10px;"></div>
			<div id="ordersGrid" style="margin:10px auto;"></div>
		</div>
  </section>
</div>

