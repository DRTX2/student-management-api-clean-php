const PORT = 8080;
const URL = `http://localhost:${PORT ? PORT : "8080"}/soa/api/students.php`;

let isCreating = false;
// const newUserBtn=document.getElementById(""),
//     editUserBtn=document.getElementById(""),
//     deleteUserBtn=document.getElementById(""),
//     saveUserBtn=document.getElementById("");
const newUserBtn = document.getElementById("btn-new-user"),
  saveUserBtn = document.getElementById("btn-save-user"),
  editUserBtn = document.getElementById("btn-edit-user"),
  deleteUserBtn = document.getElementById("btn-delete-user"),
  dniInput = document.getElementById("dni-input"),
  nameInput = document.getElementById("name-input"),
  surnameInput = document.getElementById("surname-input"),
  phoneInput = document.getElementById("phone-input"),
  addressInput = document.getElementById("address-input");

const body = (success, data, method = "GET") => {
  return (initialBody = {
    url: method === "DELETE" ? URL + "?dni=" + data.dni : URL,
    type: method,
    dataType: "json",
    data: JSON.stringify(data),
    success,
    error: (jqXHR, textStatus, errorThrown) => {
      console.error("Error en la petición AJAX:", textStatus, errorThrown);
    },
  });
};

const fetchAllUsers = () => {
  const fetchAll = body((responseData) => {
    if (!responseData) return;

    $("#dg").datagrid("loadData", {
      total: responseData["rows"].length,
      rows: responseData["rows"],
    });
  });
  $.ajax(fetchAll);
};

document.addEventListener("DOMContentLoaded", (e) => {
  fetchAllUsers();
});

newUserBtn.addEventListener("click", (e) => {
  $("#dlg")
  .dialog("open")
  .dialog("center")
  .dialog("setTitle", "Nuevo estudiante");
$("#fm").form("clear");
isCreating = true;
});

$("#fm").submit((e) => {
  e.preventDefault();
});

saveUserBtn.addEventListener("click", (e) => {
  // validar
  const dni = dniInput.value,
    name = nameInput.value,
    surname = surnameInput.value,
    phone = phoneInput.value,
    address = addressInput.value;

  if (!dni || !name || !surname || !phone || !address) {
    $.messager.show({
      title: "Error",
      msg: "Todos los campos son obligatorios",
    });
    return;
  }

  const saveUserBody = body(
    (response) => {
      $("#dlg").dialog("close"); // close the dialog
      fetchAllUsers();
      //   $("#dg").datagrid("reload"); // reload the user data
    },
    { dni, name, surname, phone, address },
    isCreating ? "POST" : "PUT"
  );
  // evitar que se envie el formulario, aunque en la variable e seria el evento del boton del form nomas

  // enviar yo mismo la peticion

  $.ajax(saveUserBody);
});

editUserBtn.addEventListener("click", (e) => {
  var row = $("#dg").datagrid("getSelected");
  if (row) {
    $("#dlg").dialog("open").dialog("center").dialog("setTitle", "Edit User");
    $("#fm").form("load", row);
  }
  isCreating = false;
});

deleteUserBtn.addEventListener("click", (e) => {
  var row = $("#dg").datagrid("getSelected");

  if (row) {
    $.messager.confirm(
      "Confirm",
      "Are you sure you want to destroy this user?",
      function (response) {
        if (!response) return;

        const selectedRow = document.querySelectorAll(
          ".datagrid-row-selected"
        )[1];
        const dniField = selectedRow.querySelector("td[field='dni'] div");
        const dni = parseInt(dniField.innerText);

        const deleteBody = body(
          (response) => {
            $("#dlg").dialog("close"); // close the dialog
            fetchAllUsers();
          },
          { dni },
          "DELETE"
        );

        $.ajax(deleteBody);
      }
    );
  }
});
