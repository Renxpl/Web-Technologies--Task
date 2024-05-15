
new Vue({
    el: '#app',
    data: {
      form: {
        name: '',
        email: '',
        phone: '',
        message: ''
      },
      errors: {
        name: '',
        email: '',
        phone: '',
        message: ''
      }
    },
    methods: {
      validateName() {
        this.errors.name = this.form.name ? '' : 'Ad gerekli.';
      },
      validateEmail() {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()[\]\.,;:\s@"]+\.[^<>()[\]\.,;:\s@"]{2,}))$/i;
        this.errors.email = re.test(this.form.email) ? '' : 'Geçerli bir e-posta adresi girin.';
      },
      validatePhone() {
        const re = /^\d{10}$/;
        this.errors.phone = re.test(this.form.phone) ? '' : 'Geçerli bir telefon numarası girin.';
      },
      validateMessage() {
        this.errors.message = this.form.message ? '' : 'Mesaj gerekli.';
      },
      clearForm() {
        this.form.name = '';
        this.form.email = '';
        this.form.phone = '';
        this.form.message = '';
        this.errors = {
          name: '',
          email: '',
          phone: '',
          message: ''
        };
      },
      submitForm() {
        this.validateName();
        this.validateEmail();
        this.validatePhone();
        this.validateMessage();
  
        if (!this.errors.name && !this.errors.email && !this.errors.phone && !this.errors.message) {
          // Tüm veriler doğrulandıktan sonra başka bir sayfada görüntülenebilir
          localStorage.setItem('contactForm', JSON.stringify(this.form));
          window.location.href = 'thankyou.html';
        }
      }
    }
  });
  