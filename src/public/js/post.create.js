function viewPhotonameAndPreviewImage(obj)
{
  // photo name
  document.getElementById('custom-file-label').textContent = obj.files[0].name;
  // preview
  const fileReader = new FileReader();
  fileReader.onload = (function() {
    document.getElementById('preview').src = fileReader.result;
  });
  fileReader.readAsDataURL(obj.files[0]);
}
