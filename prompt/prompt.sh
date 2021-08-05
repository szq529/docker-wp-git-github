#export PATH="$HOME/.rbenv/shims:$PATH"

#colors関数
autoload -Uz colors
colors

#PROMPT=$'%{\e[30;48;5;082m%}%{\e[38;5;001m%}[%n@%m]%{\e[0m%}'

PROMPT='[%m💻@%n ${F[magenta]}%D{%m/%d} $f%D{%H:%M}]$vcs_info_msg_0_
%c %# '

# git
autoload -Uz vcs_info
setopt prompt_subst
zstyle ':vcs_info:git:*' check-for-changes true
zstyle ':vcs_info:git:*' stagedstr "%F{magenta}!"
zstyle ':vcs_info:git:*' unstagedstr "%F{yellow}+"
zstyle ':vcs_info:*' formats "%F{cyan}%c%u[%b]%f"
zstyle ':vcs_info:*' actionformats '[%b|%a]'
precmd () { vcs_info }

# 直前のコマンドの重複を削除
setopt hist_ignore_dups

# 同時に起動したzshの間でヒストリを共有
setopt share_history

# 補完で小文字でも大文字にマッチさせる
zstyle ':completion:*' matcher-list 'm:{a-z}={A-Z}'
