1. Рекомендовані версії WP та плагінів:
Wordpress - 6.6.2 (версія на якій розроблялась тема);
ACF PRO - 5.9.1 (версія на якій розроблялась тема);
Cyr-To-Lat - 6.1.0 (не обовязковий, використовується для автоматичнох транскрипції посилань)


2. Для встановлення теми за допомогою візуально інтерфейсу Wordpress потрібно попередньо збільшити параметри у файлі 
php.ini:
  upload_max_filesize = 30M
  post_max_size = 30M
  max_execution_time = 300
  max_input_time = 300

.htaccess(для Apachi):
  php_value upload_max_filesize 30M
  php_value post_max_size 30M
  php_value max_execution_time 300
  php_value max_input_time 300

Також можна скористатись FTP клієнтом для завантаження файлів вручну.



3. Активація існуючих ACF-полів:
Custom Fields -> Sync available -> Select and activate all groups of fields.


4. Шаблони сторінок та публікацій.
Для головної сторінки потрібно обрати шаблон Main page.
Секції для цього шаблону реалізовані за допомогою поля Flexible, що дає можливсть багаторазово перевикористовувати шаблони секцій і розміщувати їх у довільному порядку.
Кастомний тип запису "Movies" доступний одразу після активації теми. Поля дата, рейтинг та постер реалізовані за допомогою ACF-полів, жанри - це вже таксономія(категорії).
Усі попередньо створені поля для усіх шаблонів відображатимуться на сторінці після виконання п.3. 


5. Меню та загальні параметри(опції):
Елементи меню встановлюються у: Appearance -> Menus
Лого та назва сайту встановлюються у вкладці "Options", поля для якої також збережені у форматі JSON і доступні в п.3. 


6. Робота сайту.
Відображення контенту і його впорядкованість будуєтсья на кожному обраному параметрі: вид сортування + жарн + діапазон дати релізу.

