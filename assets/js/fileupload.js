var url ="../private/fileupload.php";
function imageUpload()
{
    var imagefle = document.getElementById("logo").files[0];
    let imgFormContent = new FormData();
            imgFormContent.append('image', imagefle);
    var xhtp = new XMLHttpRequest()
    xhtp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200 ) {
            document.getElementById("path").value=this.responseText;
            alert(this.responseText)
            // Swal.fire({
            //     title: "Success",
            //     text: this.responseText,
            //     showCancelButton: false,
            //     showConfirmButton:true,
            //     icon: 'success',
            //     type: 'success'
            // });
         }
        
       };
  
     xhtp.open("POST", url, true);
     xhtp.send(imgFormContent); 
}

