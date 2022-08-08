<template>
<div class="mt-[19px] px-5" >

<label class="dayNight">
  <input id="checkbox" :checked="nightMode" type="checkbox" v-model="nightMode">
  <div></div>
</label>
</div>
</template>

<script>
export default {
  components: {
  },
  	watch: {
		nightMode: function() {
			localStorage.setItem("nightMode", JSON.stringify(this.nightMode));
            if(this.nightMode===false){
                localStorage.theme = 'light'
            }
            else if(this.nightMode===true){ 
                localStorage.theme = 'dark'
            }
            else{
                localStorage.theme = 'dark'
            }
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
		}
	},
  data(){
      return{
        nightMode: localStorage.getItem("nightMode") || false,
      }
  },
    methods: {

    }
};
</script>

<style lang="scss" scoped>

$nightBtn: #fff;
$dayBtn: #F3C60F;

.dayNight {
    cursor: pointer;
    input {
        display: none;
        & + div {
            border-radius: 50%;
            width: 22px;
            height: 22px;
            position: relative;
            box-shadow: inset 6px -5px 0 0 $nightBtn;
            transform: scale(1) rotate(-2deg);
            transition: box-shadow .5s ease 0s, transform .4s ease .1s;
            &:before {
                content: '';
                width: inherit;
                height: inherit;
                border-radius: inherit;
                position: absolute;
                left: 0;
                top: 0;
                transition: background .3s ease;
            }
            &:after {
                content: '';
                width: 5px;
                height: 5px;
                border-radius: 50%;
                margin: -4px 0 0 -4px;
                position: absolute;
                top: 55%;
                left: 55%;
                box-shadow: 0 -18px 5px $dayBtn, 0 18px 4px $dayBtn, 18px 0 4px $dayBtn, -18px 0 4px $dayBtn, 10px 10px 4px $dayBtn, -10px 10px 4px $dayBtn, 10px -10px 4px $dayBtn, -10px -10px 4px $dayBtn;
                transform: scale(0);
                transition: all .3s ease;
            }
        }
        &:checked + div {
            box-shadow: inset 22px -32px 0 0 $nightBtn;
            transform: scale(.5) rotate(0deg);
            transition: transform .3s ease .1s, box-shadow .2s ease 0s;
            &:before {
                background: $dayBtn;
                transition: background .3s ease .1s;
            }
            &:after {
                transform: scale(1.5);
                transition: transform .5s ease .15s;
            }
        }
    }
}
</style>