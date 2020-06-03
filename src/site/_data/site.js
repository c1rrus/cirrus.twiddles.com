// Figure out our base URL from (in order of
// priority):
// - Netlify env var (DEPLOY_PRIME_URL)
// - local dev URL
const siteUrl = process.env['DEPLOY_PRIME_URL'] || 'http://localhost:8080'



module.exports = {
  url: siteUrl,

  // If Netlify's CONTEXT env var says this is production,
  // we're deploying to the public site. All other cases
  // (preview, local dev, etc.) are considered non-production
  isProduction: (process.env['CONTEXT'] === 'production')
};
