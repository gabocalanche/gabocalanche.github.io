const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

const expresiones = {
    'nombres': /^[a-zA-ZÀ-ÿ\s]{1,20}$/, // Letras y espacios, pueden llevar acentos, máximo 20 caracteres.
    'apellidos': /^[a-zA-ZÀ-ÿ\s]{1,20}$/, // Letras y espacios, pueden llevar acentos, máximo 20 caracteres.
    'lugar_nacimiento': /^[a-zA-Z0-9\s_\-]{5,45}$/, // Letras, números, guion, guion_bajo y espacios, longitud entre 5 y 45 caracteres.
    'fecha_nacimiento': /^\d{4}-\d{2}-\d{2}$/, // Exactamente 8 caracteres.
    'nacionalidad': /^[a-zA-ZÀ-ÿ\s]+$/, // Solo letras y espacios, pueden llevar acentos.
    'edad': /^\d{1,2}$/, // 1 a 2 números.
    'persona_que_suministra': /^[a-zA-ZÀ-ÿ\s]{1,35}$/, // Letras y espacios, pueden llevar acentos, máximo 40 caracteres.
    'parentesco': /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos, máximo 40 caracteres.
    'direccion_calle': /^[a-zA-Z0-9\s]{1,40}$/, // Letras, números y espacios, máximo 40 caracteres.
    'direccion_linea2': /^[a-zA-Z0-9\s]{0,40}$/, // Letras, números y espacios, máximo 40 caracteres (puede ser vacío).
    'pais': /^[a-zA-Z\s]{1,40}$/, // Letras y espacios, máximo 40 caracteres.
    'ciudad': /^[a-zA-Z\s]{1,40}$/, // Letras y espacios, máximo 40 caracteres.
    'estado': /^[a-zA-Z\s]{1,40}$/, // Letras y espacios, máximo 40 caracteres.
    'codigo_postal': /^\d{5}$/, // Código postal de 5 dígitos.
    'grado': /^[a-zA-Z0-9\s]{1,40}$/, // Letras, números y espacios, máximo 40 caracteres.
    'periodo': /^[a-zA-Z0-9\s]{1,40}$/, // Letras, números y espacios, máximo 40 caracteres.
    'fecha': /^.{8}$/, // Exactamente 8 caracteres.
    'talla_camisa': /^[a-zA-Z0-9\s]{1,10}$/, // Letras, números y espacios, máximo 10 caracteres.
    'talla_pantalon': /^[a-zA-Z0-9\s]{1,10}$/, // Letras, números y espacios, máximo 10 caracteres.
    'talla_zapato': /^[a-zA-Z0-9\s]{1,5}$/, // Letras, números y espacios, máximo 5 caracteres.
    'peso': /^\d{1,4}$/, // 1 a 4 números.
    'estatura': /^\d{1,4}$/ // 1 a 4 números.
};

const validarInput = (input) => {
    const campo = input.id;

    if (expresiones[campo].test(input.value)) {
        document.getElementById(`grupo_${campo}`).classList.remove('formulario_grupo-incorrecto');
        document.getElementById(`grupo_${campo}`).classList.add('formulario_grupo-correcto');
        document.querySelector(`#grupo_${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo_${campo} i`).classList.add('fa-check-circle');
    } else {
        document.getElementById(`grupo_${campo}`).classList.remove('formulario_grupo-correcto');
        document.getElementById(`grupo_${campo}`).classList.add('formulario_grupo-incorrecto');
        document.querySelector(`#grupo_${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo_${campo} i`).classList.add('fa-times-circle');
    }
};

const validarFormulario = (e) => {
    const input = e.target;
    validarInput(input);
};

inputs.forEach((input) => {
    input.addEventListener('input', validarFormulario);
});

// Capturar eventos de cambio en los campos de la tabla de datos adicionales
document.querySelectorAll('.table-registro input').forEach((input) => {
    input.addEventListener('input', (e) => {
        validarInput(e.target);
    });
});
