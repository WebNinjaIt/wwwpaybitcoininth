# Путь к вашему репозиторию
repositoryPath="C:\Users\d.minaiev\source\wwwpaybitcoininth"

# Перейти в директорию репозитория
cd "$repositoryPath"

# Максимальное количество файлов для добавления в один коммит
maxFilesPerCommit=30000

# Получить список локально измененных файлов в репозитории
modifiedFiles=$(git status --porcelain | grep '^ M' | cut -c4-)

# Разделить измененные файлы на группы для коммитов
commitGroups=$(echo "$modifiedFiles" | xargs -n $maxFilesPerCommit)

# Пройти по группам и создать коммиты
for group in $commitGroups; do
    # Вывести информацию о процессе
    echo "Добавление измененных файлов в Git и создание коммитов..."

    # Добавить изменения и создать коммит
    git add -- $group
    git commit -m "Добавление измененных файлов из группы $group"

    # Вывести информацию о завершении процесса
    echo "Процесс для группы измененных файлов $group завершен."
done
