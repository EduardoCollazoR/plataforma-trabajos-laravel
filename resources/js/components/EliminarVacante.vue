<template>
  <button class="text-red-600 hover:text-red-900 mr-5" @click="eliminarVacante">
    Eliminar
  </button>
</template>
<script>
export default {
  props: ["vacanteId"],
  methods: {
    eliminarVacante() {
      this.$swal
        .fire({
          title: "Desea eliminar esta vacante?",
          text: "Esta accion no se puede revertir",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si",
          cancelButtonText: "No",
        })
        .then((result) => {
          if (result.isConfirmed) {
            //eliminar por axios
            const params = {
              id: this.vacanteId,
              _method: "delete",
            };
            axios
              .post(`/vacantes/${this.vacanteId}`, params)
              .then((respuesta) => {
                this.$swal.fire(
                  "Vacante eliminada",
                  respuesta.data.mensaje,
                  "success"
                );
                //eliminar desde el dom
                this.$el.parentNode.parentNode.parentNode.removeChild(
                  this.$el.parentNode.parentNode
                );
              })
              .catch((error) => {
                console.log(error);
              });
          }
        });
    },
  },
};
</script>
