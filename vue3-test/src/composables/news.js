import { ref, toValue, watchEffect } from "vue"

export function useNews(options) {
    const { country, category } = options

    const news = ref(null)
    const error = ref(null)
    const loading = ref(null)

    watchEffect(() => {
        if (toValue(country) != null && toValue(category) != null) {
            loading.value = true

            news.value = null
            error.value = null

            fetch(`https://newsapi.org/v2/top-headlines?country=${toValue(country)}&category=${toValue(category)}&apiKey=548e1897c60f4951b014f60d73f87383`)
                .then((res) => res.json())
                .then((json) => {
                    news.value = json
                    loading.value = false
                })
                .catch((err) => {
                    error.value = err
                    loading.value = false
                })
        }
    })


    return { news, error, loading }

}