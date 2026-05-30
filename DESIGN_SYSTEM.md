# Quran School Management Platform — Premium UI Design System

Production-ready SaaS UI for an Arabic-first RTL PHP MVC app. Two delivery options:

| Option | Active in app | Build |
|--------|---------------|-------|
| **Bootstrap 5** | Yes — `public/assets/css/styles.css` | CDN + custom CSS (no build required) |
| **Tailwind CSS** | Opt-in — compile to `tailwind.css` | `npm run build:css` |

---

## Design principles

- Mobile-first, RTL (`dir="rtl"`, `lang="ar"`)
- Light base: `#f8fafc` canvas, white cards, deep green `#0f766e` primary, gold `#d4af37` accent (sparingly)
- 8px spacing grid, soft shadows, 200–300ms transitions
- Dark mode: `html[data-theme="dark"]` — charcoal `#141f1c`, no pure black
- Accessibility: focus rings, contrast, `prefers-reduced-motion`

---

## Token reference (shared semantics)

| Token | Light | Dark |
|-------|-------|------|
| `--color-primary` | `#0f766e` | `#2dd4bf` |
| `--color-gold` | `#d4af37` | same |
| `--bg-page` | `#f8fafc` | `#141f1c` |
| `--bg-panel` | `#ffffff` | `#1e2e29` |
| `--radius-sm/md/lg` | 8px / 12px / 16px | same |
| `--duration-fast` | 200ms | same |
| `--shadow-card` | soft elevation | deeper |

Typography: **Cairo** / **Tajawal** (Arabic), **Inter** (Latin fallback).

---

## 1) Tailwind CSS

### Files

- `tailwind.config.js` — colors, fonts, spacing, radii, shadows, animations
- `public/assets/css/tailwind-theme.css` — `@layer` components + CSS variables
- `app/Views/examples/tailwind-dashboard.html` — static reference markup

### Build

```bash
npm install
npm run build:css
```

Add to a layout when using Tailwind:

```html
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/tailwind.css" />
```

### Component classes

| Class | Use |
|-------|-----|
| `.btn-primary` `.btn-secondary` `.btn-outline` `.btn-danger` `.btn-success` | Buttons |
| `.btn-icon` `.btn-loading` | Icon / loading |
| `.card-surface` `.glass-card` `.dashboard-stat` `.feature-card` | Cards |
| `.form-field` `.form-input` `.form-label-floating` `.form-error` | Forms |
| `.table-premium` `.table-premium--responsive` | Tables |
| `.status-badge` `.status-active` `.status-pending` `.status-rejected` | Badges |
| `.sidebar-panel` `.sidebar-link` `.sidebar-link-active` | Sidebar |
| `.modal-backdrop-custom` `.modal-surface` | Modals |

### Dark mode

```html
<html data-theme="light">
```

Toggle via `data-theme-toggle` + `app.js` (shared with Bootstrap).

---

## 2) Bootstrap 5 custom theme

### Files

- `public/assets/css/styles.css` — **production theme** (loaded in layouts)
- `public/assets/css/bootstrap-theme.scss` — SCSS source / variable overrides
- `public/assets/js/app.js` — theme, sidebar, reveal, forms

### Compile SCSS (optional)

```bash
npm run build:bootstrap
```

### Bootstrap component mapping

| Need | Classes |
|------|---------|
| Primary CTA | `btn btn-primary` |
| Secondary | `btn btn-secondary` |
| Outline | `btn btn-outline-primary` |
| Icon | `btn btn-soft btn-icon` |
| Loading submit | `data-loading` on `<form>` |
| KPI card | `stat-card` + `stat-card__value` |
| Glass | `glass-card` |
| Status | `badge badge-status active\|pending\|rejected` |
| Table desktop | `table table-striped table-hover` |
| Table mobile | `table table-mobile` + `data-label` on `<td>` |
| Floating label | `form-floating` |
| Validation | `needs-validation` `data-validate` |

### Dashboard layout

```
.dashboard-shell
  .dashboard-sidebar (+ .sidebar-open mobile, .sidebar-collapsed desktop)
  .dashboard-panel
    .dashboard-topbar
    .dashboard-content
```

---

## 3) Live examples in the repo

| Page | Path |
|------|------|
| Admin dashboard (KPI + chart + activity) | `app/Views/dashboard/admin.php` |
| Login split-screen | `app/Views/auth/login.php` |
| Table + mobile stack | `app/Views/admin/pending.php` |
| Form reference | `app/Views/examples/form-page.php` |

---

## JavaScript behaviour (`app.js`)

- **Theme**: `localStorage` key `qsm-theme`, default `light`, `[data-theme-toggle]`
- **Sidebar**: `[data-sidebar-toggle]` mobile drawer, `[data-sidebar-collapse]` desktop width
- **Reveal**: `[data-reveal]` / `.reveal` → `.is-visible` on scroll
- **Forms**: `data-validate`, `data-loading`, `.is-invalid` on invalid fields

---

## Switching to Tailwind in production

1. Run `npm run build:css`
2. Create `app/Views/layouts/dashboard-tailwind.php` linking `tailwind.css` instead of `styles.css`
3. Port markup using classes from `tailwind-theme.css` and `examples/tailwind-dashboard.html`

---

## Brand identity checklist

- Green gradient primary buttons (not generic blue)
- Gold accent on badges, sidebar active indicator, stat card top bar
- Deep green sidebar `#0c2922` (Islamic elegant, not generic gray admin)
- Subtle glass only on marketing/auth panels
- Arabic copy and RTL spacing (padding-inline, `translateX` on nav hover)

---

*Quran School Management Platform — UI system v1.0*
