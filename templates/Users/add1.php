<form action="javascript:void(0)" id="frm-add-product" enctype="multipart/form-data">
   <div class="form-group">
       <input type="text" name="name" class="form-control" placeholder="Name">
   </div>
   <div class="form-group">
       <textarea name="description" class="form-control" placeholder="Description"></textarea>
   </div>
   <div class="form-group">
       <input type="file" name="image" class="form-control" class="image">
   </div>
   <div class="form-group">
       <input type="number" min="0" name="cost" class="form-control" placeholder="Cost">
   </div>
   <div class="form-group">
       <button type="submit" class="btn btn-success">Save</button>
   </div>
</form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
        $(function() {

            // Ajax form submission with image
            $('#frm-add-product').on('submit', function(e) {

                e.preventDefault();

                var formData = new FormData(this);
               
                //We can add more values to form data
                //formData.append("key", "value");

                $.ajax({
                    url: "http://localhost:8765/users/add1",
                    type: "POST",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error at add data');
                    }
                });
            });
        });
    </script>