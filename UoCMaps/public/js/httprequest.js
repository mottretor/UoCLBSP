<script >

var srcdst =  {'source':
                         {'latitude':'3', 
                          'longitude':'3', 
                          'inside':'2'}
                        , 
                      'destination': 
                         {'latitude':'fd', 
                          'longitude':'f', 
                          'inside':'fdd'}
                        
                      };

var detailsJSon = JSON.stringify(srcdst);


//HttpClient httpClient = HttpClientBuilder.create().build(); //Use this instead 

try {

// { name:'firstname', value:'sisira'}
    
    $.ajax({
    	url: 'http://ec2-52-72-156-17.compute-1.amazonaws.com:1978',
      dataType: 'json',
    	type:'POST',
    	data: "dsdsdsdsdetailsJSon",
    	success: function (returnData) {
        //window.alert(returnData);
        console.log(returnData);
    		$('#target').html(returnData);
    	}
    });

    //handle response here...

}catch (Exception ex) {

    window.alert(ex);

} finally {
    //Deprecated
    //httpClient.getConnectionManager().shutdown(); 
}
</script>