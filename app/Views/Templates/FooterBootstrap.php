 <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

    <script src="<?=base_url('js/bootstrap.bundle.min.js')?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <!-- <script src="dashboard.js"></script> -->
    <script src="<?=base_url('dashboard/dashboard.js')?>"></script>

    <!-- Awal Masking -->
    <script>
        $(document).ready(function(){
			// Format mata uang.
			$('#ktp').mask('00-00-00-000000-0000', {reverse: true});		
			$('#harga').mask('000,000,000,000,000,000', {reverse: true});		
            $('#besar_bayar').mask('0,000,000,000,000,000', {reverse: true});		
            $('#harga_deal').mask('0,000,000,000,000,000', {reverse: true});	
		})
	</script>
    <!-- Akhir Masking -->
<script>
    	   	var date1 = $("#firstDate")

       
</script>
</body>
</html>