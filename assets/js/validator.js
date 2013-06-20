
		function is_alphaneu(data){
			if(data=='' || data==null)return false;
			 if( /[^a-zA-Z0-9]/.test( data ) ) {
				return false;
			} 
			return true;
		}
		
		function is_neum(data){
			if(data=='' || data==null)return false;
			return !isNaN(parseFloat(n)) && isFinite(n);
		}
		
		function is_email(x){
			if(x=='' || x==null)return false;
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		
