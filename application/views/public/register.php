<body style="background-color: hsl(0,0%,80%);">
   <div class="d-flex justify-content-center py-5">
      <div class="card w-50 p-3">
         <h4 class="text-center">Login</h4>
         <form action="<?= base_url() ?>home/registerku" method="post">
            <div class="form-row">
               <div class="col-sm">
                  <div class="form-group">
                     <h5 for="exampleInputEmail1">Username</h5>
                     <input required="true" type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
               </div>
               <div class="col-sm">
                  <div class="form-group">
                     <h5 for="exampleInputEmail1">Display</h5>
                     <input required="true" type="text" class="form-control" name="display" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
               </div>
            </div>
            <div class="form-row">
               <div class="col-sm">
                  <div class="form-group">
                     <h5 for="exampleInputEmail1">Password</h5>
                     <input required="true" type="text" onkeyup="password()" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                  </div>
               </div>
               <div class="col-sm">
                  <div class="form-group">
                     <h5 for="exampleInputEmail1">Confirm</h5>
                     <input required="true" type="text" onkeyup="password()" class="form-control" name="confirm" id="confirm" aria-describedby="emailHelp">
                  </div>
               </div>
               <span id="alert"></span>
            </div>
            <div class="form-row">
               <div class="col-sm">
                  <div class="form-group">
                     <h5 for="exampleInputEmail1">Nomor Telpon</h5>
                     <input type="text" onkeyup="password()" class="form-control" name="no_telpon" aria-describedby="emailHelp">
                  </div>
               </div>
               <div class="col-sm">
                  <div class="form-group">
                     <h5 for="exampleInputEmail1">email</h5>
                     <input  type="email" class="form-control" name="email" aria-describedby="emailHelp">
                  </div>
               </div>
               <span id="alert"></span>
            </div>
            <button type="submit" id="button" class="btn btn-dark">Submit</button>
         </form>
      </div>
   </div>
   <script>
      function password() {
         var password = document.getElementById('password');
         var confirm = document.getElementById('confirm');
         var button = document.getElementById('button');
         if (password.value != confirm.value) {
            password.style.backgroundColor = "hsl(0,100%,70%)";
            confirm.style.backgroundColor = "hsl(0,100%,70%)";
            button.disabled = true;
            document.getElementById('alert').innerHTML = "PASSWORD IS NOT MATCH";
         } else {
            password.style.backgroundColor = "hsl(100,100%,70%)";
            confirm.style.backgroundColor = "hsl(100,100%,70%)";
            button.disabled = true;
            document.getElementById('alert').innerHTML = "PASSWORD IS NOT MATCH";
         }
      }
   </script>
</body>