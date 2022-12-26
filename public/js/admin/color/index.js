let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "name" },
        { data: "hexa" },
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.reset()
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="name"]').value = content.name
    form.querySelector('input[name="hexa"]').value = content.hexa
}

