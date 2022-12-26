let buttonsDestroyImgProduct = document.querySelectorAll('.destroyImgProduct')
function modalDestroy(e)
{
    e.preventDefault()

    Swal.fire({
        title: 'Deseas eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Si!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            elementDestroy(this)
        }
    })
}

function elementDestroy(elemet)
{
    axios.delete(elemet.dataset.url).then(r => {
        Swal.fire(
            'Eliminado!',
            '',
            'success'
        )
       
        elemet.parentElement.remove()
    }).catch(error => console.error(error))

}

buttonsDestroyImgProduct.forEach(buttonDestroyImgProduct => {
    buttonDestroyImgProduct.addEventListener('click', modalDestroy)
});

$(document).ready(function() {
    $('.select2').select2();
});

let borrarFicha = document.getElementById('borrarFicha')

function fichaDestroy(e)
{
    e.preventDefault()

    axios.delete(e.target.dataset.url)
    .then(r => e.target.parentElement.remove())
    .catch(error => console.error(error))
}

if (borrarFicha) 
    borrarFicha.addEventListener('click', fichaDestroy)