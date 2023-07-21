import { defineStore } from "pinia"

const dummyUser = 'admin'
const dummyPass = '12345'

export const useAuth = defineStore('auth', {
    state: () => ({
        loginAttemptLeft: 5,
        isAuthenticated: false,
        error: '',
        user: '',
        pass: '',
        loginHistory: [],
        isLocked: false
    }),
    getters: {
        getLoginHistory() {
            return this.loginHistory.sort((a, b) => b.time - a.time)
        }
    },
    actions: {
        login() {
            if (this.isLocked) return

            if (this.user != dummyUser || this.pass != dummyPass) {
                if (this.loginAttemptLeft > 0) {
                    this.error = `Wrong credentials, you have ${this.loginAttemptLeft} attempt left`

                    this.loginAttemptLeft--
                } else {
                    this.error = 'Too many login attempt failure, your account blocked'
                    this.isLocked = true
                }
            } else {
                this.loginAttemptLeft = 5
                this.isAuthenticated = true
                this.error = '';
            }

            this.loginHistory.push({
                user: this.user,
                pass: this.pass,
                attemptLeft: this.loginAttemptLeft,
                error: this.error,
                success: this.isAuthenticated,
                time: new Date()
            })
        },
        reset() {
            this.loginAttemptLeft = 5
            this.error = ''
            this.isAuthenticated = false
            this.loginHistory = []
            this.user = ''
            this.pass = '',
            this.isLocked = false
        },
        logout() {
            this.loginAttemptLeft = 5
            this.error = ''
            this.isAuthenticated = false
            this.user = ''
            this.pass = '',
            this.isLocked = false
        }
    }
})