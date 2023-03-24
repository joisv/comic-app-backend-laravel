const typeElements = document.querySelectorAll('.types');

      for (const typeElement of typeElements) {
            
        // Dapatkan teks dari elemen "types"
        const typeText = typeElement.textContent;

        // Cari elemen dengan class "bgTypes" yang terkait dengan elemen "types"
        const bgTypeElement = typeElement.closest('.bgTypes');

        // Jika teks elemen "types" adalah "Doujin", tambahkan class "bg-doujin" ke elemen "bgTypes"
        if (typeText === 'Doujin') {
          bgTypeElement.classList.add('bg-doujinshi')
        } else if (typeText === 'Manhwa')
        {
          bgTypeElement.classList.add('bg-manhwa')
        }
      }
