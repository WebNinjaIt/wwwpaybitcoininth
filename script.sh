git status --short | head -n 15000 | awk '{print $2}' | while read file; do
  git add -- "$file"
done

git commit -m "Init from file bash"