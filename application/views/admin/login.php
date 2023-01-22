<style>
    footer{
        display:none;
    }

    .content{
        width:100vw;
        height:100vh;
        background:#ffd6eb;
    }


    .logincard{
        width:400px;
    }

</style>

<div class="content d-flex justify-content-center align-items-center">

<div class="card p-4 logincard">
    <div class="card-header bg-transparent border-0">
        <h2 style="font-family: 'Dancing Script', cursive;color:#ff95e0;font-size:3rem">Login</h2>
    </div>
    <div class="card-body">
        <form >
            <div class="col-md-12">
                <div class="form-group">
                    <label for="blog_title" class="form-label mb-2">AdminName</label>
                    <input type="text" class="form-control" name="adminloginname" id="adminloginname" placeholder="Enter Name">
                </div>
                
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label for="blog_title" class="form-label mb-2">Password</label>
                        <input type="password" class="form-control" name="adminloginpassword" id="adminloginpassword" placeholder="Enter Password">
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="form-group">
                        
                        <input type="submit" class="form-control btn btn-success" name="adminloginsubmit" id="submit" >
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>


<script>
    $('#submit').on('click',function(e){
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/adminloginCode')?>",
        data: {
            "adminloginname" : $('#adminloginname').val(),
            "adminloginpassword" : $('#adminloginpassword').val(),
        },
        success: function(result){
           response = JSON.parse(result)

           if(response.responsecode == "200"){
            window.location.replace("<?php echo base_url('admin/')?>");
           }
           else{
            alert(`${response.responseMessage}`)
           }
        },
       
    })
});
</script>