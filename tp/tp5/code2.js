function vv()
{
    nom=document.getElementById("n").value;
    if(/[A-Za-z]/.test(nom)==false)
      {
        alert("uniquement des lettres");
         
      }
}

function valider()
{
    document.getElementById("p").value=document.getElementById("p").value.replace(/[^a-z]/,"");
}

function mail()
{
    em=document.getElementById("e").value;
    if(/gmail.com$/.test(em)==false)
    {
        alert("mail invalide");
    }
}