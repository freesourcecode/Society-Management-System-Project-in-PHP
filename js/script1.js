$(document).ready(function(){

/*	TRANSACTION	*/	
	$('.status').change(function(){
		if($(this).val() == ""){
			$('.expenses').each(function(){
				$(this).empty();
				$('<option value = "">Choose an option</option>').appendTo($(this));
				$(this).attr('disabled', 'disabled');
			});	
			$('#bal').hide();
			$('#balance').val('');
			$('.price').val('');
			$('.payment').val('');
		}
		if($(this).val() == "Balance"){
			$('.expenses').each(function(){
				$(this).removeAttr('disabled', 'disabled');
				$(this).empty();
				$(this).load('get_balance.php?student_id=' + $('#student_id').val());
			});
			$('#bal').show();
			$('#balance').val('');
			$('.price').val('');
			$('.payment').val('');
		}
		if($(this).val() == "Available"){
			$('.expenses').each(function(){
				$(this).removeAttr('disabled', 'disabled');
				$(this).empty();
				$(this).load('get_avail.php?student_id=' + $('#student_id').val());
			});
			$('#bal').hide();
			$('#balance').val('');
			$('.price').val('');
			$('.payment').val('');
		}
	});
	
	$('.expenses').change(function(){
		if($('.status').val() == "Balance"){
			$('.price').val('');
			$('.payment').removeAttr('max');
			$('.payment').val('');
			$('#balance').val('');
			$expenses_id = $(this).val();
			$student_id = $('#student_id').val();
			if($(this).val() != ""){	
				$.ajax({
					url: 'bal_pay.php',
					method: 'POST',
					dataType: 'json',
					data:{
						expenses_id: $expenses_id,
						student_id: $student_id
					},
					success: function(res){
						$('.price').val(res.price);
						$('#balance').val(res.balance);
						$('.deadline').val(res.deadline);
						$total_payment = res.price - res.payment;
						$('.payment').attr('max', $total_payment);
						$transact_id = res.transact_id;
					}
				});
			}	
		}else{
			$('.price').val('');
			$('.payment').removeAttr('max');
			$('.payment').val('');
			$expenses_id = $(this).val();
			$.ajax({
				url: "get_price.php", 
				method: "POST",
				dataType: "json",
				data: {
						expenses_id: $expenses_id
				}, 
				success: function(data){
					$('.price').val(data.price);
					$('.deadline').val(data.deadline);
					$price = data.price;
					$('.payment').attr('max', data.price);
				}
			});
		}
	});
	
	$('#btn_cash').click(function(){
		if($('.status').val() == "Balance"){
			$('#p_error').empty();
			$payment = $('.payment').val();
			$balance = $('#balance').val();
			$p_error = $('<label class = "text-danger">Must not exceed the balance!</label>');
			if($('.payment').val() == ""){
				alert("Please enter your payment");
			}else{
				$('#btn_cash').attr('disabled', 'disabled');
				$.ajax({
					method: "POST",
					url: "update_transact.php",
					data:{
						payment: $payment,
						transact_id: $transact_id,
						balance: $balance
					},
					success: function(res){
						if(res == "high"){
							$p_error.appendTo($('#p_error'));
							$('#btn_cash').removeAttr('disabled', 'disabled');
						}else{
							$('.payment').val('');
							$('#btn_cash').removeAttr('disabled', 'disabled');
							$('.status').empty();
							$('<option value = "">Choose an option</option>').appendTo($('.status'));
							$('<option>Balance</option>').appendTo($('.status'));
							$('<option>Available</option>').appendTo($('.status'));
							$('.expenses').empty();
							$('<option value = "">Choose an option</option>').appendTo($('.expenses'));
							$('.expenses').attr('disabled', 'disabled');
							$('.price').val('');
							$('#balance').val('');
						}
					}
				});
			}
		}else{
			$('#p_error').empty();
			$payment = $('.payment').val();
			$student_id = $('#student_id').val();
			$p_error = $('<label class = "text-danger">Must not exceed the price!</label>');
			if($('.payment').val() == ""){
				alert("Please enter your payment");
			}else{	
				$('#btn_cash').attr('disabled', 'disabled');	
				$.ajax({
					method: "POST",
					url: "save_transaction.php",
					data: {
							student_id: $student_id,
							expenses_id: $expenses_id,
							price: $price,
							payment: $payment
					},
					success: function(res){
						if(res == "high"){
							$p_error.appendTo($('#p_error'));
							$('#btn_cash').removeAttr('disabled', 'disabled');
						}else{
							$('.payment').val('');
							$('#btn_cash').removeAttr('disabled', 'disabled');
							$('.status').empty();
							$('<option value = "">Choose an option</option>').appendTo($('.status'));
							$('<option>Balance</option>').appendTo($('.status'));
							$('<option>Available</option>').appendTo($('.status'));
							$('.expenses').empty();
							$('<option value = "">Choose an option</option>').appendTo($('.expenses'));
							$('.expenses').attr('disabled', 'disabled');
							$('.price').val('');
						}
					}
				});
			}	
		}	
	});
});