#export PATH="$HOME/.rbenv/shims:$PATH"

#colors関数
autoload -Uz colors
colors

PROMPT='[%m💻@%n ${F[magenta]}%D{%m/%d}$f %D{%H:%M}]$vcs_info_msg_0_
%c %# '

# git
autoload -Uz vcs_info
setopt prompt_subst
zstyle ':vcs_info:git:*' check-for-changes true
zstyle ':vcs_info:git:*' stagedstr "%F{magenta}!" #ステージングされた
zstyle ':vcs_info:git:*' unstagedstr "%F{yellow}+" #ステージングされていない変更がある
zstyle ':vcs_info:*' formats "%F{cyan}%c%u[%b]%f"
zstyle ':vcs_info:*' actionformats '[%b|%a]'
precmd () { vcs_info }

# 直前のコマンドの重複を削除
setopt hist_ignore_dups

# 同時に起動したzshの間でヒストリを共有
setopt share_history

# 補完で小文字でも大文字にマッチさせる
zstyle ':completion:*' matcher-list 'm:{a-z}={A-Z}'
