<template>
    <div class="lang">
        <select name="language" class="form-select" @change="changeLanguage" v-model="language">
            <option value="en">Japan</option>
            <option value="vi">English</option>
        </select>
    </div>
</template>
<script>
export default {
    data() {
        return {
            language: document.head.querySelector('meta[name="locale"]').content,
        };
    },
    methods: {
        changeLanguage() {
            axios.get('/language/' + this.language).then((response) => {
                console.log(response);
            })
        }
    }
};
</script>
