<template>
    <div class="container">
        <div class="w-full lg:w-1/3">
            <div class="border rounded-lg overflow-hidden">
                <div class="bg-gray-50 py-4 px-4 border-b border-gray-200">
                    Register
                </div>
                <div class="p-4">
                    <form @submit.prevent="register">
                        <div class="mb-5">
                            <label for="name" class="text-xs uppercase font-medium block mb-2">
                                Name
                            </label>
                            <input type="text" v-model="form.name" name="name" id="name" class="w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-500 h-10 px-4 transition duration-150">
                            <div class="text-red-500 mt-2 text-sm" v-if="errors['name']">{{ errors['name'][0] }}</div>
                        </div>
                        <div class="mb-5">
                            <label for="email" class="text-xs uppercase font-medium block mb-2">
                                Email
                            </label>
                            <input type="email" v-model="form.email" name="email" id="email" class="w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-500 h-10 px-4 transition duration-150">
                            <div class="text-red-500 mt-2 text-sm" v-if="errors['email']">{{ errors['email'][0] }}</div>
                        </div>
                        <div class="mb-5">
                            <label for="password" class="text-xs uppercase font-medium block mb-2">
                                Password
                            </label>
                            <input type="password" v-model="form.password" name="password" id="password" class="w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-500 h-10 px-4 transition duration-150">
                            <div class="text-red-500 mt-2 text-sm" v-if="errors['password']">{{ errors['password'][0] }}</div>
                        </div>
                        <div class="mb-5">
                            <label for="password_confirmation" class="text-xs uppercase font-medium block mb-2">
                                Confirm Password
                            </label>
                            <input type="password" v-model="form.password_confirmation" name="password_confirmation" id="password_confirmation" class="w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-500 h-10 px-4 transition duration-150">
                        </div>
                        <button class="px-4 h-10 rounded-lg focus:ring focus:ring-blue-300 bg-blue-500 hover:bg-blue-600 text-white">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { reactive, ref } from 'vue'
import router from '@/router'
import store from '@/store'
export default {
    setup () {
        const errors = ref([])

        const form = reactive({
            name: '',
            email: '',
            password: '',
            password_cofirmmation: '',
        })

        const register = async () => {
            try {
                await axios.post('register', form)
                await store.dispatch('auth/me')
                router.replace('/')
            } catch (e) {
                errors.value = e.response.data.errors
            }
            
        }

        return {form, register, errors}
    }
}
</script>

<style>

</style>