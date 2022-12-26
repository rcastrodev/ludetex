function addVariableProduct(e)
{
    e.preventDefault()
    let btn = e.target
    
    if(! btn.classList.contains('addVP')) 
        return undefined

    
    
    let obj = {
        id:             `${document.getElementById('inputproductid').value}-${$('select[name=presentation] option').filter(':selected').val()}-${$('select[name=color] option').filter(':selected').val()}`,
        productid:      document.getElementById('inputproductid').value,
        name:           document.getElementById('inputname').value,
        category:       document.getElementById('inputcategory').value,
        color:          $('select[name=color] option').filter(':selected').val(),
        presentation:   $('select[name=presentation] option').filter(':selected').val(),
        number:         document.getElementById('inputnumber').value
    }

    if (obj.color == "Seleccionar" || obj.presentation == "Seleccionar") {

        btn.textContent = "Debe Seleccionar las opciones"
        setTimeout(() => {
            btn.textContent = "Agregar al pedido"
        }, 3000);

        return null
    }
    
    
    axios.post(btn.dataset.url, obj)
    .then(response => {
        $('#mensaje').removeClass('d-none')
        setTimeout(() => {
            location.reload()
        }, 4000);
    })
    .catch(error =>{
        console.error(error)
        btn.textContent = 'Error'
        setTimeout(() => {
            btn.textContent = 'Agregar al pedido'
        }, 10000);
    })
    
}

let table = document.getElementById('tableVP')

if (table) 
    table.addEventListener('click', addVariableProduct)

$('.toggle').click(function(e){
    e.preventDefault()
    $(this).siblings('ul').toggle();
})
