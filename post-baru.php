<?php
include 'include/header.php';
$pb=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$pbdata=mysql_fetch_array($pb);
?>

<div class="form">
   <span class="title" style="color: black; font-size: 40px; margin-left: 32.5%"><strong> Buat Pertanyaan </strong></span>
   <form id="form1" name="form1" method="post" action="post-baru-proses.php">
      <div class="br">
         <label for="Kategori"> Kategori </label>
         <select name="kategori" style="margin-top: 20px">
            <option value="0">Kosong</option>
            <option value="1">Gaya Hidup</option>
            <option value="2">Olahraga</option>
            <option value="3">Teknologi</option>
         </select>
         <select name="sub" style="width:220px">
            <option value="3"> Tidak Ada Category Terpilih </option>
         </select>
      </div>   

      <div class="br">
         <label for="topic" style="padding-right: 20px"> Topic </label>
         <input name="topic" type="text" id="topic" placeholder="Masukkan Topic" style="margin-left: auto; width: 80%">
      </div>

      <div class="br">
         <label for="Detail" style="padding-right: 18px"> Detail </label>
      </div>   
      <div class="br">
         <textarea name="detail" type="text" id="detail" placeholder="Masukkan Detail" style="margin-left: 18.5%; margin-top: -6%; width: 80% "></textarea>
      </div>

      <div class="br">
         <label for="Name" style="padding-right: 20px"> Name </label>
         <input name="name" type="text" id="name" style="margin-left: auto; width: 80%" value="<?php echo $pbdata['username'] ?>" readonly/>
      </div>

      <div class="br">
         <label for="Email" style="padding-right: 20px"> Email </label>
         <input name="email" type="email" id="email" style="margin-left: auto; width: 80%" value="<?php echo $pbdata['email'] ?>" readonly/>
      </div>
      
      <div class="br" style="margin-left: 45%;" width="100px">
         <button type="submit" name="Submit" style="width: 30%"> Submit </button>
      </div>

      <div class="br" style="margin-left: 45%; padding-bottom: 70px">
         <button type="reset" name="Submit2" style="width: 30%"> Reset </button>
      </div>

      <div class="kembali" style="margin-top: -20%;">
         <a href="index.php"> &nbsp; Kembali &nbsp;</a>
      </div>   

   </form>
</div>      

<script src="js/jquery.min.js"></script>
<script type="text/javascript">
   var categories = {
      "None":[{value:'1', text:'No cataegory selected'}],
      "Gaya Hidup":[{value:'11', text:'Kesehatan'}, {value:'12', text:'Konsultasi Penyakit'}],
      "Olahraga":[{value:'13', text:'Bersepeda'},{value:'14', text:'Jogging'}],
      "Teknologi":[{value:'8', text:'Gadget'},{value:'9', text:'Games'},{value:'10', text:'PC'}],
      };
   function selectchange(){
      var select = $('[name=sub]');
      select.empty();
      $.each(categories[$(':selected', this).text()], function(){
           select.append('<option value="'+this.value+'">'+this.text+'</option>');
      });
   }
   $(function(){
      $('[name=kategori]').on('change', selectchange);
   });
</script>

</body>
</html>
         