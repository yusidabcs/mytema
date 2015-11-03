define(['jquery'], function($)
{
	return new function(){
		var self = this;
		var URL = window.location.protocol + "//" + window.location.host;
		var lod ="<img src='"+URL+"/img/ajax-loader.gif' id='lod'>";
		self.run = function(){
			negara();
			provinsi();
		};

		var negara = function(){
			// pilih negara
			$('#negara').change(function(){
				$(this).parent().append(lod);
				$('#provinsi').attr('disabled', 'true');
				id=this.value;
				if(id!=''){			
					$(this).attr("disabled",true);
					$.ajax({
				  	  url: URL+'/admin/provinsi/list/'+id,		    
				  	  type: 'get',
					}).done(function(data){		
						$('#provinsi').find('option').remove();						
					}).done(function(data){
						$('#provinsi').removeAttr('disabled');
						$('#provinsi').append(data);
						$('#lod').remove();
						$('#negara').attr("disabled",false);
					});
				}else{
					$('#lod').remove();
				}
			});
		};

		var provinsi = function(){
			// pilih provinsi
			$('#provinsi').change(function(){
				$(this).parent().append(lod);
				$('#kota').attr('disabled', 'true');
				id=this.value;
				if(id!=''){		
					$(this).attr("disabled",true);
					$.ajax({
				  	  url: URL+'/admin/kabupaten/list/'+id,	    
				  	  type: 'get',
					}).done(function(data){		
						$('#kota').find('option').remove();						
					}).done(function(data){
						$('#kota').removeAttr('disabled');
						$('#kota').append(data);
						$('#lod').remove();
						$('#provinsi').attr("disabled",false);
					});
				}
			});
		};
	}
});