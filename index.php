<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SJC</title>

		<link rel="stylesheet" href="assets/demo.css">
		<link rel="stylesheet" href="assets/form-basic.css">
		<script>
			function open_period()
			{
				$("#calc_annual_leave").fadeOut();
				$("#result_annual_leave").fadeOut();
				$("#calc_end_of_service").fadeOut();
				$("#result_end_of_service").fadeOut();
				$("#calc_open_ended_contract").fadeOut();
				$("#result_open_ended_contract").fadeOut();
				$("#calc_notice").fadeOut();
				$("#result_notice").fadeOut();

				$("#calc_period").fadeIn();
				$("#result_period").fadeIn();
			}
		</script>
		<script>
			function open_annual_leave()
			{
				$("#calc_period").fadeOut();
				$("#result_period").fadeOut();			  
				$("#calc_end_of_service").fadeOut();
				$("#result_end_of_service").fadeOut();
				$("#calc_open_ended_contract").fadeOut();
				$("#result_open_ended_contract").fadeOut();
				$("#calc_notice").fadeOut();
				$("#result_notice").fadeOut();

				$("#calc_annual_leave").fadeIn();
				$("#result_annual_leave").fadeIn();
			}
		</script>		
		<script>
			function open_eos()
			{
				$("#calc_annual_leave").fadeOut();
				$("#result_annual_leave").fadeOut();
				$("#calc_period").fadeOut();
				$("#result_period").fadeOut();
				$("#calc_open_ended_contract").fadeOut();
				$("#result_open_ended_contract").fadeOut();
				$("#calc_notice").fadeOut();
				$("#result_notice").fadeOut();

				$("#calc_end_of_service").fadeIn();
				$("#result_end_of_service").fadeIn();
			}
		</script>
		<script>
			function open_notice()
			{
				$("#calc_annual_leave").fadeOut();
				$("#result_annual_leave").fadeOut();
				$("#calc_period").fadeOut();
				$("#result_period").fadeOut();
				$("#calc_end_of_service").fadeOut();
				$("#result_end_of_service").fadeOut();			  
				$("#calc_open_ended_contract").fadeOut();
				$("#result_open_ended_contract").fadeOut();
				
				$("#calc_notice").fadeIn();
				$("#result_notice").fadeIn();
			}
		</script>		
		<script>
			function open_open_ended_contract()
			{
				$("#calc_annual_leave").fadeOut();
				$("#result_annual_leave").fadeOut();
				$("#calc_period").fadeOut();
				$("#result_period").fadeOut();
				$("#calc_end_of_service").fadeOut();
				$("#result_end_of_service").fadeOut();	
				$("#calc_notice").fadeOut();
				$("#result_notice").fadeOut();				

				$("#calc_open_ended_contract").fadeIn();
				$("#result_open_ended_contract").fadeIn();
			}
		</script>
		<script>
			/*
			 * Function to calculate the absolute difference in days, months and years between 2 days taking into account variable month lengths and leap years
			 * It ignores any time component (ie hours, minutes and seconds)
			 *
			 */
			function calc_period()
			{
				var dt1 = new Date(document.getElementsByName("start")[0].value);
				var dt2 = new Date(document.getElementsByName("end")[0].value);
				var dt2 = new Date(dt2.getTime() + 60 * 60 * 24 * 1000);
				/*
				 * setup 'empty' return object
				 */
				var ret = {days:0, months:0, years:0};

				/*
				 * If the dates are equal, return the 'empty' object
				 */
				if (dt1 == dt2) return ret;

				/*
				 * ensure dt2 > dt1
				 */
				if (dt1 > dt2)
				{
					var dtmp = dt2;
					dt2 = dt1;
					dt1 = dtmp;
				}

				/*
				 * First get the number of full years
				 */

				var year1 = dt1.getFullYear();
				var year2 = dt2.getFullYear();

				var month1 = dt1.getMonth();
				var month2 = dt2.getMonth();

				var day1 = dt1.getDate();
				var day2 = dt2.getDate();

				/*
				 * Set initial values bearing in mind the months or days may be negative
				 */

				ret['years'] = year2 - year1;
				ret['months'] = month2 - month1;
				ret['days'] = day2 - day1;

				/*
				 * Now we deal with the negatives
				 */

				/*
				 * First if the day difference is negative
				 * eg dt2 = 13 oct, dt1 = 25 sept
				 */
				if (ret['days'] < 0)
				{
					/*
					 * Use temporary dates to get the number of days remaining in the month
					 */
					var dtmp1 = new Date(dt1.getFullYear(), dt1.getMonth() + 1, 1, 0, 0, -1);

					var numDays = dtmp1.getDate();

					ret['months'] -= 1;
					ret['days'] += numDays;

				}

				/*
				 * Now if the month difference is negative
				 */
				if (ret['months'] < 0)
				{
					ret['months'] += 12;
					ret['years'] -= 1;
				}
				if(ret['years'] > 1)
				{
					var years = " سنوات - "
				}
				else
				{
					var years = " سنة - "
				}
				if(ret['months'] > 1)
				{
					var months = " أشهر - "
				}
				else
				{
					var months = " شهر - "
				}				
				if(ret['days'] > 1)
				{
					var days = " أيام"
				}
				else
				{
					var days = " يوم"
				}	
				document.getElementsByName('period')[0].value = ret['years']+years+ret['months']+months+ret['days']+days;
				document.getElementsByName('period')[3].value = ret['years']+years+ret['months']+months+ret['days']+days;
				
				var dt1 = new Date(document.getElementsByName("start")[0].value);
				var dt2 = new Date(document.getElementsByName("end")[0].value);
				var dt2 = new Date(dt2.getTime() + 60 * 60 * 24 * 1000);
				var notice = parseInt(document.getElementsByName('notice')[0].value);
				var dt2 = new Date(dt2.getTime() + (notice * 60 * 60 * 24 * 1000));
				/*
				 * setup 'empty' return object
				 */
				var ret = {days:0, months:0, years:0};

				/*
				 * If the dates are equal, return the 'empty' object
				 */
				if (dt1 == dt2) return ret;

				/*
				 * ensure dt2 > dt1
				 */
				if (dt1 > dt2)
				{
					var dtmp = dt2;
					dt2 = dt1;
					dt1 = dtmp;
				}

				/*
				 * First get the number of full years
				 */

				var year1 = dt1.getFullYear();
				var year2 = dt2.getFullYear();

				var month1 = dt1.getMonth();
				var month2 = dt2.getMonth();

				var day1 = dt1.getDate();
				var day2 = dt2.getDate();

				/*
				 * Set initial values bearing in mind the months or days may be negative
				 */

				ret['years'] = year2 - year1;
				ret['months'] = month2 - month1;
				ret['days'] = day2 - day1;

				/*
				 * Now we deal with the negatives
				 */

				/*
				 * First if the day difference is negative
				 * eg dt2 = 13 oct, dt1 = 25 sept
				 */
				if (ret['days'] < 0)
				{
					/*
					 * Use temporary dates to get the number of days remaining in the month
					 */
					var dtmp1 = new Date(dt1.getFullYear(), dt1.getMonth() + 1, 1, 0, 0, -1);

					var numDays = dtmp1.getDate();

					ret['months'] -= 1;
					ret['days'] += numDays;

				}

				/*
				 * Now if the month difference is negative
				 */
				if (ret['months'] < 0)
				{
					ret['months'] += 12;
					ret['years'] -= 1;
				}
				if(ret['years'] > 1)
				{
					var years = " سنوات - "
				}
				else
				{
					var years = " سنة - "
				}
				if(ret['months'] > 1)
				{
					var months = " أشهر - "
				}
				else
				{
					var months = " شهر - "
				}				
				if(ret['days'] > 1)
				{
					var days = " أيام"
				}
				else
				{
					var days = " يوم"
				}	
				
				document.getElementsByName('notice')[1].value = ret['years']+years+ret['months']+months+ret['days']+days;	
				document.getElementsByName('period')[1].value = ret['years']+years+ret['months']+months+ret['days']+days;
				document.getElementsByName('period')[2].value = ret['years']+years+ret['months']+months+ret['days']+days;
				document.getElementsByName('notice')[2].value = notice;

				var amount = 0;
				var gross = document.getElementsByName('gross')[0].value;
				amount = (ret['years'] * 12 * gross) + (ret['months'] * gross) + (gross / 30 * ret['days']);		
				amount = amount.toFixed(3);
				document.getElementsByName('amount_period')[0].value = amount;
				if(document.getElementsByName('amount_period')[0].value != "NaN")
				{
					document.getElementById('open_annual_leave').disabled = false;
					document.getElementById('open_eos').disabled = false;
					document.getElementById('open_notice').disabled = false;
					
					document.getElementById('open_annual_leave').style.background = "";
					document.getElementById('open_eos').style.background = "";
					document.getElementById('open_notice').style.background = "";
					
				}
				else
				{
					document.getElementById('open_annual_leave').disabled = true;
					document.getElementById('open_eos').disabled = true;
					document.getElementById('open_notice').disabled = true;
					
					document.getElementById('open_annual_leave').style.background = "grey";
					document.getElementById('open_eos').style.background = "grey";
					document.getElementById('open_notice').style.background = "grey";
				}
			}
		</script>	
		<script>
			function calc_annual_leave()
			{
				var dt1 = new Date(document.getElementsByName("start")[0].value);
				var dt2 = new Date(document.getElementsByName("end")[0].value);
				var dt2 = new Date(dt2.getTime() + 60 * 60 * 24 * 1000);
				var notice = parseInt(document.getElementsByName('notice')[0].value);
				var dt2 = new Date(dt2.getTime() + (notice * 60 * 60 * 24 * 1000));
				/*
				 * setup 'empty' return object
				 */
				var ret = {days:0, months:0, years:0};

				/*
				 * If the dates are equal, return the 'empty' object
				 */
				if (dt1 == dt2) return ret;

				/*
				 * ensure dt2 > dt1
				 */
				if (dt1 > dt2)
				{
					var dtmp = dt2;
					dt2 = dt1;
					dt1 = dtmp;
				}

				/*
				 * First get the number of full years
				 */

				var year1 = dt1.getFullYear();
				var year2 = dt2.getFullYear();

				var month1 = dt1.getMonth();
				var month2 = dt2.getMonth();

				var day1 = dt1.getDate();
				var day2 = dt2.getDate();

				/*
				 * Set initial values bearing in mind the months or days may be negative
				 */

				ret['years'] = year2 - year1;
				ret['months'] = month2 - month1;
				ret['days'] = day2 - day1;

				/*
				 * Now we deal with the negatives
				 */

				/*
				 * First if the day difference is negative
				 * eg dt2 = 13 oct, dt1 = 25 sept
				 */
				if (ret['days'] < 0)
				{
					/*
					 * Use temporary dates to get the number of days remaining in the month
					 */
					var dtmp1 = new Date(dt1.getFullYear(), dt1.getMonth() + 1, 1, 0, 0, -1);

					var numDays = dtmp1.getDate();

					ret['months'] -= 1;
					ret['days'] += numDays;

				}

				/*
				 * Now if the month difference is negative
				 */
				if (ret['months'] < 0)
				{
					ret['months'] += 12;
					ret['years'] -= 1;
				}
				var annual_leaves = 0;
				if(ret['years'] >= 3)
				{
						annual_leaves = 15 + 30; // 2 years
						annual_leaves = annual_leaves + (11 * 2.5); // 11 months
						annual_leaves = annual_leaves + (2.5/30*29); // 29 days
				}
				else if(ret['years'] == 2)
				{
					annual_leaves = 15+30; // 2 years
					annual_leaves = annual_leaves + ret['months']*2.5;
					annual_leaves = annual_leaves + (2.5/30*ret['days']);
				}
				else if(ret['years'] == 1 && ret['months'] == 0 && ret['months'] == 0)
				{
					annual_leaves = 30;
				}
				else if((ret['years'] == 1) && (ret['months'] > 0 || ret['days'] > 0))
				{
					annual_leaves = 15;
					annual_leaves = annual_leaves + ret['months']*2.5;
					annual_leaves = annual_leaves + (2.5/30*ret['days']);
				}
				else if(ret['years'] < 1)
				{
					annual_leaves = 0;
					annual_leaves = annual_leaves + ret['months']*2.5;
					annual_leaves = annual_leaves + (2.5/30*ret['days']);
				}
				
				document.getElementsByName('annual_leaves')[0].value = annual_leaves.toFixed(2);
				var basic = parseInt(document.getElementsByName('basic')[0].value);
				var allowance = parseInt(document.getElementsByName('allowance')[0].value);
				
				var amount_annual_leaves = (basic + allowance) / 30 * annual_leaves;
				amount_annual_leaves = amount_annual_leaves.toFixed(3);
				document.getElementsByName('amount_annual_leaves')[0].value = amount_annual_leaves;
			}
		</script>	
		<script>
			function calc_end_of_service()
			{
				var dt1 = new Date(document.getElementsByName("start")[0].value);
				var dt2 = new Date(document.getElementsByName("end")[0].value);
				var dt2 = new Date(dt2.getTime() + 60 * 60 * 24 * 1000);
				var notice = parseInt(document.getElementsByName('notice')[0].value);
				var dt2 = new Date(dt2.getTime() + (notice * 60 * 60 * 24 * 1000));
				/*
				 * setup 'empty' return object
				 */
				var ret = {days:0, months:0, years:0};

				/*
				 * If the dates are equal, return the 'empty' object
				 */
				if (dt1 == dt2) return ret;

				/*
				 * ensure dt2 > dt1
				 */
				if (dt1 > dt2)
				{
					var dtmp = dt2;
					dt2 = dt1;
					dt1 = dtmp;
				}

				/*
				 * First get the number of full years
				 */

				var year1 = dt1.getFullYear();
				var year2 = dt2.getFullYear();

				var month1 = dt1.getMonth();
				var month2 = dt2.getMonth();

				var day1 = dt1.getDate();
				var day2 = dt2.getDate();

				/*
				 * Set initial values bearing in mind the months or days may be negative
				 */

				ret['years'] = year2 - year1;
				ret['months'] = month2 - month1;
				ret['days'] = day2 - day1;

				/*
				 * Now we deal with the negatives
				 */

				/*
				 * First if the day difference is negative
				 * eg dt2 = 13 oct, dt1 = 25 sept
				 */
				if (ret['days'] < 0)
				{
					/*
					 * Use temporary dates to get the number of days remaining in the month
					 */
					var dtmp1 = new Date(dt1.getFullYear(), dt1.getMonth() + 1, 1, 0, 0, -1);

					var numDays = dtmp1.getDate();

					ret['months'] -= 1;
					ret['days'] += numDays;

				}

				/*
				 * Now if the month difference is negative
				 */
				if (ret['months'] < 0)
				{
					ret['months'] += 12;
					ret['years'] -= 1;
				}
				var years = ret['years'];
				var months = ret['months'];
				var days = ret['days'];
				var basic = parseInt(document.getElementsByName('basic')[1].value);
				var allowance = parseInt(document.getElementsByName('allowance')[1].value);
				var total = basic + allowance;
				var years_amount = 0;
				var months_amount = 0;
				var days_amount = 0;
				
				if(months != 0 && years < 3)
				{
					months_amount = total / 2 / 12 * months;
				}				
				else if(months != 0 && years>=3)
				{
					months_amount = total / 12 * months;
				}
				if(days != 0 && years < 3)
				{
					days_amount = total / 2 / 12 / 30 * days;
				}				
				else if(days != 0 && years >= 3)
				{
					days_amount = total / 2 / 12 / 30 * days;
				}
				if(years >= 3)
				{
					years_amount = 3 * total;
					years = years - 3;
					if(years != 0)
					{
						years_amount = years_amount + (years*total);
					}
				}
				else if(years<3)
				{
					years_amount = years * (0.5*total);
				}
				var eos_total = (years_amount + months_amount + days_amount).toFixed(3);
				
				document.getElementsByName('amount_end_of_service')[0].value = eos_total;
			}
		</script>
		<script>
			function calc_notice()
			{
				var basic = parseInt(document.getElementsByName('basic')[2].value);
				var allowance = parseInt(document.getElementsByName('allowance')[2].value);
				var notice = parseInt(document.getElementsByName('notice')[2].value);
				
				var total = basic + allowance;
				
				var notice_amount = (total / 30 * notice).toFixed(3);
				
				document.getElementsByName('amount_notice')[0].value = notice_amount;
			}
		</script>
		<script>
			function calc_open_ended_contract()
			{
				var dt1 = new Date(document.getElementsByName("start")[0].value);
				var dt2 = new Date(document.getElementsByName("end")[0].value);
				var dt2 = new Date(dt2.getTime() + 60 * 60 * 24 * 1000);
				/*
				 * setup 'empty' return object
				 */
				var ret = {days:0, months:0, years:0};

				/*
				 * If the dates are equal, return the 'empty' object
				 */
				if (dt1 == dt2) return ret;

				/*
				 * ensure dt2 > dt1
				 */
				if (dt1 > dt2)
				{
					var dtmp = dt2;
					dt2 = dt1;
					dt1 = dtmp;
				}

				/*
				 * First get the number of full years
				 */

				var year1 = dt1.getFullYear();
				var year2 = dt2.getFullYear();

				var month1 = dt1.getMonth();
				var month2 = dt2.getMonth();

				var day1 = dt1.getDate();
				var day2 = dt2.getDate();

				/*
				 * Set initial values bearing in mind the months or days may be negative
				 */

				ret['years'] = year2 - year1;
				ret['months'] = month2 - month1;
				ret['days'] = day2 - day1;

				/*
				 * Now we deal with the negatives
				 */

				/*
				 * First if the day difference is negative
				 * eg dt2 = 13 oct, dt1 = 25 sept
				 */
				if (ret['days'] < 0)
				{
					/*
					 * Use temporary dates to get the number of days remaining in the month
					 */
					var dtmp1 = new Date(dt1.getFullYear(), dt1.getMonth() + 1, 1, 0, 0, -1);

					var numDays = dtmp1.getDate();

					ret['months'] -= 1;
					ret['days'] += numDays;

				}

				/*
				 * Now if the month difference is negative
				 */
				if (ret['months'] < 0)
				{
					ret['months'] += 12;
					ret['years'] -= 1;
				}
				var years = ret['years'];
				var months = ret['months'];
				var days = ret['days'];
				var basic = parseInt(document.getElementsByName('basic')[3].value);
				var allowance = parseInt(document.getElementsByName('allowance')[3].value);
				var total = basic + allowance;
				
				if(years == 0 && days == 0 && months < 3)
				{
					if(document.getElementsByName('arbitrary_dismissal')[0].value == 'yes')
					{
						document.getElementsByName('amount_open_ended_contract')[0].value = total;
					}
					else
					{
						alert('لايوجد تعويض');
						document.getElementsByName('amount_open_ended_contract')[0].value = 0;
					}
				}
				if(months >= 3)
				{
					if(years >= 1)
					{
						months = months + (12 * years);
					}
					if(days >= 1)
					{
						months = months + 1;
					}
					open_ended_contract_amount = total / 30 * 2 * months;
					if(document.getElementsByName('arbitrary_dismissal')[0].value == 'yes')
					{
						open_ended_contract_amount = open_ended_contract_amount + (open_ended_contract_amount * 0.5);
					}
					document.getElementsByName('amount_open_ended_contract')[0].value = open_ended_contract_amount;
				}
			}
		</script>
	</head>
	<body>
		<div style="margin-top:10px">
			<a href="" style="text-decoration:none; cursor:pointer; border-radius: 2px; background-color:  #6caee0; color: #ffffff; font-weight: bold; box-shadow: 1px 2px 4px 0 rgba(0, 0, 0, 0.08); padding: 14px 22px; border: 0;">بدء من جديد</a>
		</div>
			<!--------------------------------------Period------------------------------------->
		<div id="calc_period" class="main-content">
			<div class="form-basic">
				<div class="form-title-row">
					<h1>احتساب مدة الخدمة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>تاريخ بداية العمل</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='date' autocomplete="off" name="start"/>
					<br><br>
					<span>تاريخ آخر يوم عمل</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='date' autocomplete="off" name="end"/>
					<br><br>
					<span>مهلة الاخطار</span>	
					<br>
					<input style="text-align:right;" type='text' autocomplete="off" name="notice" value="0" />
					<br><br>
					<span>الأجر الشهري الإجمالي</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="gross" value="0"  />
				</div>
				<div class="form-row">
					<center><button onclick="calc_period();" style="margin:0" type="submit">حساب</button></center>
				</div>
			</div>
		</div>
		<div id="result_period" class="main-content">
			<div class="form-basic">
				<div class="form-title-row">
					<h1>النتيجة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>مدة العمل</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="period" readonly/>	
					<br><br>
					<span>مهلة الإخطار</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="notice" readonly/>
					<br><br>
					<span>المبلغ</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="amount_period" readonly/>
				</div>
				<div class="form-row" style="text-align:center" >
					<center>
						<button id="open_annual_leave" onclick="open_annual_leave();" style="margin:0; display:inline-block; background:grey" type="submit" disabled>بدل اإجازات</button>
						<button id="open_eos" onclick="open_eos();" style="margin:0; display:inline-block; background:grey" type="submit" disabled>نهاية الخدمة</button>
						<button id="open_notice" onclick="open_notice();" style="margin:0; display:inline-block; background:grey" type="submit" disabled>مدة الإخطار</button>
						<!--<button onclick="open_open_ended_contract();" style="margin:0; display:inline-block;" type="submit" disabled>تعويض عقد غير محدد</button>-->
					</center>
				</div>
			</div>
		</div>
			<!----------------------------------------END-------------------------------------->
		
			<!------------------------------------Annual Leave--------------------------------->
		<div id="calc_annual_leave" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>احتساب بدل الإجازة السنوية</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>مدة العمل</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="period" readonly/>
					<br><br>
					<span>الأجر الأساسي</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="basic" value="0" placeholder="دينار" />					
					<br><br>
					<span>العلاوة الإجتماعية</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="allowance" value="0" placeholder="دينار" />
				</div>
				<div class="form-row">
					<center><button onclick="calc_annual_leave();" style="margin:0" type="submit">حساب</button></center>
				</div>
			</div>
		</div>
		<div id="result_annual_leave" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>النتيجة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>أيام الإجازات</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="annual_leaves" readonly/>	
					<br><br>
					<span>المبلغ</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="amount_annual_leaves" readonly/>
				</div>
				<div class="form-row" style="text-align:center" >
					<center>
						<button onclick="open_period();" style="margin:0; display:inline-block" type="submit">مدة العمل</button>
						<button onclick="open_eos();" style="margin:0; display:inline-block;" type="submit">نهاية الخدمة</button>
						<button onclick="open_notice();" style="margin:0; display:inline-block;" type="submit">مدة الإخطار</button>
						<!--<button onclick="open_open_ended_contract();" style="margin:0; display:inline-block;" type="submit">تعويض عقد غير محدد</button>-->
					</center>
				</div>
			</div>
		</div>
			<!----------------------------------------END-------------------------------------->
			<!-----------------------------------End of Service-------------------------------->
		<div id="calc_end_of_service" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>احتساب مكافأة نهاية الخدمة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>مدة العمل</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="period" readonly/>
					<br><br>
					<span>الأجر الأساسي</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="basic" value="0" placeholder="دينار" />					
					<br><br>
					<span>العلاوة الإجتماعية</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="allowance" value="0" placeholder="دينار" />
				</div>
				<div class="form-row">
					<center><button onclick="calc_end_of_service();" style="margin:0" type="submit">حساب</button></center>
				</div>
			</div>
		</div>
		<div id="result_end_of_service" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>النتيجة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>المبلغ</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="amount_end_of_service" readonly/>
				</div>
				<div class="form-row" style="text-align:center" >
					<center>
						<button onclick="open_period();" style="margin:0; display:inline-block" type="submit">مدة الخدمة</button>
						<button onclick="open_annual_leave();" style="margin:0; display:inline-block;" type="submit">بدل الإجازات</button>
						<button onclick="open_notice();" style="margin:0; display:inline-block;" type="submit">مدة الإخطار</button>
						<!--<button onclick="open_open_ended_contract();" style="margin:0; display:inline-block;" type="submit">تعويض عقد غير محدد</button>-->
					</center>
				</div>
			</div>
		</div>
			<!----------------------------------------END-------------------------------------->			
			<!---------------------------------------Notice------------------------------------>
			<div id="calc_notice" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>احتساب مدة الإخطار</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>مهلة الاخطار</span>	
					<br>
					<input style="text-align:right;" type='text' autocomplete="off" name="notice" value="0" />
					<br><br>
					<span>الأجر الأساسي</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="basic" value="0"  />					
					<br><br>
					<span>العلاوة الإجتماعية</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="allowance" value="0"  />
				</div>
				<div class="form-row">
					<center><button onclick="calc_notice();" style="margin:0" type="submit">حساب</button></center>
				</div>
			</div>
		</div>
		<div id="result_notice" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>النتيجة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>المبلغ</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="amount_notice" readonly/>
				</div>
				<div class="form-row" style="text-align:center" >
					<center>
						<button onclick="open_period();" style="margin:0; display:inline-block" type="submit">مدة الخدمة</button>
						<button onclick="open_annual_leave();" style="margin:0; display:inline-block" type="submit">بدل اإجازات</button>
						<button onclick="open_eos();" style="margin:0; display:inline-block" type="submit">نهاية الخدمة</button>
						<!--<button onclick="open_open_ended_contract();" style="margin:0; display:inline-block;" type="submit">تعويض عقد غير محدد</button>-->
					</center>
				</div>
			</div>
		</div>
			<!---------------------------------Open Ended Contract------------------------------>
		<div id="calc_open_ended_contract" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>احتساب تعويض العقد غير محدد المدة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>مدة العمل الفعلية</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="period" readonly/>
					<br><br>
					<span>الأجر الأساسي</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="basic" value="0" placeholder="دينار" />					
					<br><br>
					<span>العلاوة الإجتماعية</span>
					<br>					
					<input style="text-align:right;" type='text' autocomplete="off" name="allowance" value="0" placeholder="دينار" />
					<br><br>
					<span>فصل تعسفي</span>
					<br>
					<select name="arbitrary_dismissal" style="width:240px">
						<option value="yes">نعم</option>
						<option value="no" checked>لا</option>
					</select>
				</div>
				<div class="form-row">
					<center><button onclick="calc_open_ended_contract();" style="margin:0" type="submit">حساب</button></center>
				</div>
			</div>
		</div>
		<div id="result_open_ended_contract" class="main-content" hidden>
			<div class="form-basic">
				<div class="form-title-row">
					<h1>النتيجة</h1>
				</div> 
				<div class="form-row" style="text-align:center; direction:rtl">
					<span>المبلغ</span>	
					<br>
					<input style="text-align:right;" onpaste="return false;" type='text' autocomplete="off" name="amount_open_ended_contract" readonly/>
				</div>
				<div class="form-row" style="text-align:center" >
					<center>
						<button onclick="open_period();" style="margin:0; display:inline-block" type="submit">مدة الخدمة</button>
						<button onclick="open_annual_leave();" style="margin:0; display:inline-block;" type="submit">بدل الإجازات</button>
						<button onclick="open_notice();" style="margin:0; display:inline-block;" type="submit">مدة الإخطار</button>
						<button onclick="open_eos();" style="margin:0; display:inline-block;" type="submit">نهاية الخدمة</button>
					</center>
				</div>
			</div>
		</div>
			<!----------------------------------------END-------------------------------------->
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment-with-locales.min.js'></script>
		<script src='js/bootstrap-datetimepicker.min.js'></script>
	</body>
</html>
