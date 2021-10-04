<template>
<div>
   <ul class="flex flex-wrap justify-center">
       <li
       class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
       v-for="(skill,i) in this.skills"
       v-bind:key="i"
       @click="activar($event)"
       :class="verificarClaseActiva(skill)">{{skill}}
       </li>

   </ul>

   <input type="hidden" name="skilss" id="skills">
   </div>
</template>

<script>
export default{
props:['skills','oldskills'],
mounted:function(){
document.querySelector("#skills").value=this.oldskills;
},
created:function(){
if(this.oldskills){
    const skillsArray=this.oldskills.split(",");
    skillsArray.forEach(skill=> this.habilidades.add(skill));
}
},
mounted(){

},
data:function(){
return{
    habilidades:new Set()
}
},
methods:{
    activar(e){
        if(e.target.classList.contains('bg-teal-400')){
            //skill activo
            e.target.classList.remove('bg-teal-400');
            //eliminar delser de habilibiades

            this.habilidades.delete(e.target.textContent)
        }else{
            // no esta activo
            e.target.classList.add('bg-teal-400');
            //agregar al set 
            this.habilidades.add(e.target.textContent);
        }

        //agregar las habilibiades al input
const stringHabilidades=[...this.habilidades];
document.querySelector('skills').value=this.stringHabilidades;

    },
    verificarClaseActiva(skill){
return this.habilidades.has(skill)? 'bg-teal-400':'';
    }
}
}
</script>
