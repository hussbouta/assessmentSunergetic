// URL API sunergetics
let url = "http://localhost:8000/api/v1/customers/";

// Button for deleting customers
let btnDelete = function (cell, formatterParams, onRendered) {
  return "<i class='text-danger fa-solid fa-trash-can'></i>";
};

// Button for updating customers
let btnEdit = function (cell, formatterParams, onRendered) {
  return "<i class='text-primary fa-regular fa-floppy-disk'></i>";
};

// Table
let table = new Tabulator("#cpanel", {
  ajaxURL: url,
  ajaxResponse: function (url, params, response) {
    return response.data;
  },
  layout: "fitColumns",
  paginationSize: 10,
  pagination: true,
  maxHeight: "100%",
  footerElement: "<button id='btnAddCustomer' class='btn btn-success'>Add customer</button>",
  columns: [{
      title: "Firstname",
      field: "firstname",
      editor: "textarea",
      maxWidth: 300,
      headerFilter: "input",
    },
    {
      title: "Lastname",
      field: "lastname",
      editor: "textarea",
      maxWidth: 300,
      headerFilter: "input",
    },
    {
      title: "Email",
      field: "email",
      editor: "textarea",
      maxWidth: 300,
      validator: "regex:^[A-Za-z._]{1,}@[A-Za-z]{1,}[.]{1}[A-Za-z.]{2,6}$",
      headerFilter: "input",
    },
    {
      title: "Address",
      field: "address",
      editor: "textarea",
      maxWidth: 300,
      headerFilter: "input",
    },
    {
      title: "Zipcode",
      field: "zipcode",
      editor: "textarea",
      maxWidth: 300,
      headerFilter: "input",
    },
    {
      title: "City",
      field: "city",
      editor: "textarea",
      maxWidth: 300,
      headerFilter: "input",
    },
    {
      title: "Phone",
      field: "phone",
      editor: "textarea",
      maxWidth: 300,
      headerFilter: "input",
    },
    {
      title: "Delete",
      formatter: btnDelete,
      headerHozAlign: "center",
      hozAlign: "center",
      maxWidth: 120,
      headerFilter: "input",
      cellClick: function (e, cell) {
        let message = cell.getData().firstname ?
          "Delete customer " + cell.getData().firstname :
          "Cancel creation?";

        Swal.fire({
          title: "Are you sure?",
          text: message,
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: cell.getData().firstname ?
            "Yes, delete it!" :
            "Remove edition",
        }).then((result) => {
          if (result.isConfirmed) {
            let id = cell.getData().id;
            let response = $.ajax({
              url: url + id,
              type: "DELETE",
            });
            Swal.fire("Deleted!", "Customer deleted.", "success").then(
              function () {
                table.replaceData();
              }
            );
          }
        });
      },
    },
    {
      title: "Update",
      formatter: btnEdit,
      headerHozAlign: "center",
      hozAlign: "center",
      maxWidth: 120,
      headerFilter: "input",
      cellClick: async function (e, cell) {
        let id = cell.getData().id;
        let route = id ? url + id : url;
        let method = id ? "PUT" : "POST";
        $.ajax({
          url: route,
          type: method,
          dataType: "json",
          data: cell.getData(),
          success: function (data) {
            Swal.fire({
              position: "top-end",
              icon: "info",
              title: data.message,
              showConfirmButton: false,
              timer: 2000,
            }).then(function () {
              table.replaceData();
            });
          },
          error: function (textStatus, errorThrown) {
            let errors = JSON.stringify(textStatus.responseJSON.errors);
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: errors.replace(/[\])}"[{(]/g, ""),
              footer: '<a href="">Why do I have this issue?</a>',
            });
          },
        });
      },
    },
  ],
});

table.on("tableBuilt", function () {
  let btnAddCustomer = document.getElementById("btnAddCustomer");
  btnAddCustomer.addEventListener("click", function () {
    table.addRow({});
  });
});

table.on("cellEdited", function (cell) {
  cell.getElement().style.backgroundColor = "#f8c291";
});
