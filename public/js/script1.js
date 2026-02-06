
        const kategoriBtn = document.getElementById('kategoriBtn');
        const kategoriWrapper = document.getElementById('kategoriWrapper');

        kategoriBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            kategoriWrapper.classList.toggle('active');
        });

        document.addEventListener('click', function() {
            kategoriWrapper.classList.remove('active');
        });



        lucide.createIcons();


        const tabs = document.querySelectorAll('.tab');
        const subList = document.getElementById('subList');

        const data = {
            buku: [
                'Ebook',
                'Buku Cetak',
                'Buku Referensi',
                'Buku Pelajaran'
            ],
            digital: [
                'Majalah Digital',
                'Audio Book',
                'Video Edukasi',
                'Jurnal Online'
            ]
        };

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // aktifkan tab
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // animasi keluar
                subList.classList.add('fade');

                setTimeout(() => {
                    const type = tab.dataset.tab;
                    subList.innerHTML = '';

                    data[type].forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = item;
                        subList.appendChild(li);
                    });

                    // animasi masuk
                    subList.classList.remove('fade');
                }, 200);
            });
        });


    const buttons = document.querySelectorAll('.category');
    const books = document.querySelectorAll('.book');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {

            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const category = btn.dataset.category;

            books.forEach(book => {
                if (category === 'all' ||
                    book.dataset.category === category) {
                    book.style.display = "block";
                } else {
                    book.style.display = "none";
                }
            });
        });
    });

    lucide.createIcons();


